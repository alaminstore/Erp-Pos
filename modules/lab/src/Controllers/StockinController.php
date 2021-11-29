<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use SkylarkSoft\GoRMG\Lab\Models\Stockindetail;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Models\Racklist;
use SkylarkSoft\GoRMG\Lab\Models\Color;
use SkylarkSoft\GoRMG\Lab\Models\Fabriccomposition;
use SkylarkSoft\GoRMG\Lab\Models\FabricBook;
use SkylarkSoft\GoRMG\Lab\Models\Stockin;
use SkylarkSoft\GoRMG\Lab\Requests\StockinRequest;

class StockinController extends Controller
{

    public function index()
    {
        $stocks = Stockin::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.stockin')->with('stocks', $stocks);
    }


    public function create(Request $request)
    {
        $stock = null;
        $sid = FabricBook::all()->unique('sid')->pluck('sid', 'id');
        $color = Color::all()->pluck('name', 'id');
        $fabriccomposition = Fabriccomposition::all()->pluck('name', 'id');
        $gsm = FabricBook::all()->pluck('gsm', 'id');
        $dia = FabricBook::all()->pluck('dia', 'id');
        $booking_qty = FabricBook::all()->pluck('booking_qty', 'id');
        $racklist = Racklist::all()->pluck('name', 'id');

        return view('lab::forms.stockin', [
            'stock'=>$stock,
            'sid' => $sid,
            'racklist'=>$racklist,
            'color'=>$color,
            'fabriccomposition'=>$fabriccomposition,
            'gsm'=>$gsm,
            'dia'=>$dia,
            'booking_qty'=>$booking_qty
        ]);
    }

    public function store(StockinRequest $request)
    {
        try {
            DB::beginTransaction();
            $stockin = new Stockin();
            $stockin->sid = $request->sid;
            $stockin->buyer = $request->buyer;
            $stockin->zalopo = $request->zalopo;
            $stockin->style = $request->style;
            $stockin->fabric_type = $request->fabric_type;
            $stockin->invoice_no = $request->invoice_no;
            $stockin->racklist_id = $request->racklist_id;
            $stockin->rack_floor = $request->rack_floor;
            $stockin->pattern_name = $request->pattern_name;
            $stockin->date = $request->date;
            $stockin->system = $request->system;
            $stockin->save();
            $stockinId = $stockin->id;
            $stockinSid = $stockin->sid;
            $stockinsystem = $stockin->system;
            $data = [];
            foreach ($request->color_id as $key => $color_id) {
                $data[] = [

                    'stockin_id' => $stockinId,
                    'sid' => $stockinSid,
                    'color_id' => $request->color_id[$key],
                    'fabriccomposition_id' => $request->fabriccomposition_id[$key],
                    'gsm' => $request->gsm[$key],
                    'dia' => $request->dia[$key],
                    'booking_qty' => $request->booking_qty[$key],
                    'roll_no' => $request->roll_no[$key],
                    'receiving_qty' => $request->receive_qty[$key],
                    'uom' => $request->uom[$key],
                    'remarks' => $request->remarks[$key],
                    'system' => $stockinsystem,
                ];
            }
            DB::table('stockin_details')->insert($data);
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('stockin');

        }catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $stock = Stockin::findOrFail($id);
            $stock->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('stockin');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }


    public function styleid($id)
    {
        return Style::where('name', $id)->get();
    }


    public function findTextBoxValue(Request $request){
        return FabricBook::with("buyer","style","zalopo")->where('id',$request->id)->first();

    }

    public function fabric($id) // for dependency dropdown in stockin
    {
        return Fabricbook::with("Fabriccomposition")->where('color_id', $id)->get();

    }
    public function gsm($id) // for dependency dropdown in stockin
    {
        return Fabricbook::where('fabriccomposition_id', $id)->get();

    }
    public function dia($id) // for dependency dropdown in stockin
    {
        return Fabricbook::where('id', $id)->get();

    }

    public function viewStockin($id){
        $stockin = Stockin::get()->where('id',$id);
        $stockin_details = Stockindetail::get()->where('stockin_id',$id);
        return view('lab::pages.stockinview',compact('stockin','stockin_details'));
    }

}
