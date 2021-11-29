<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\FabricBook;
use SkylarkSoft\GoRMG\Lab\Models\Fabriccomposition;
use SkylarkSoft\GoRMG\Lab\Models\Stock;
use SkylarkSoft\GoRMG\Lab\Models\Stockin;
use SkylarkSoft\GoRMG\Lab\Models\Stockindetail;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Models\Color;
use SkylarkSoft\GoRMG\Lab\Models\StockoutDetail;
use SkylarkSoft\GoRMG\Lab\Models\Stockout;
use SkylarkSoft\GoRMG\Lab\Requests\StockoutRequest;

class StockoutController extends Controller
{

    public function index()
    {
        $stockout = Stockout::orderBy('id', 'desc')->paginate();
        return view('lab::pages.stockout')->with('stockout', $stockout);;
    }

    public function create()
    {
        $stockout = null;
        $delivery_to = [1 => 'Cutting Section', 2 => 'Sample Section'];
        $systemin = Stockin::all()->pluck('system', 'id');
        $color = Color::all()->pluck('name', 'id');
        $fabriccomposition = Fabriccomposition::all()->pluck('name', 'id');
        $gsm = Stockindetail::all()->pluck('gsm', 'id');
        $dia = Stockindetail::all()->pluck('dia', 'id');
        $booking_qty = Stockindetail::all()->pluck('booking_qty', 'id');
        $receiving_qty = Stockindetail::all()->pluck('receiving_qty', 'id');

        return view('lab::forms.stockout', [
            'stockout' => $stockout,
            'delivery_to' => $delivery_to,
            'systemin' => $systemin,
            'color' => $color,
            'fabriccomposition' => $fabriccomposition,
            'gsm' => $gsm,
            'dia' => $dia,
            'booking_qty' => $booking_qty,
            'receiving_qty' => $receiving_qty,
        ]);
    }


    public function store(StockoutRequest $request)
    {

//        if ($request->booking_quantity < $request->delivery_quantity) {
//            Session::flash('alert-danger', 'Delivery Qty cant not grater than  !!');
//        }
//
        try {

            DB::beginTransaction();
            $stockout = new Stockout();
            $stockout->systemout = $request->systemout;
            $stockout->systemin = $request->systemin;
            $stockout->date = $request->date;
            $stockout->delivery = $request->delivery;
            $stockout->invoice_no = $request->invoice_no;
            $stockout->buyer = $request->buyer;
            $stockout->zalopo = $request->zalopo;
            $stockout->style = $request->style;
            $stockout->req_no = $request->req_no;
            $stockout->racklist = $request->racklist;
            $stockout->rack_floor = $request->rack_floor;
            $stockout->fabric_type = $request->fabric_type;
            $stockout->pattern_name = $request->pattern_name;
            $stockout->save();
            $stockoutId = $stockout->id;
            $stockoutSystemin = $stockout->systemin;
            $stockinSystemOut = $stockout->systemout;
            $data = [];
            foreach ($request->color_id as $key => $color_id) {
                $data[] = [
                    'stockout_id' => $stockoutId,
                    'systemout' => $stockinSystemOut,
                    'systemin' => $stockoutSystemin,
                    'color_id' => $request->color_id[$key],
                    'fabriccomposition_id' => $request->fabriccomposition_id[$key],
                    'gsm' => $request->gsm[$key],
                    'dia' => $request->dia[$key],
                    'booking_quantity' => $request->booking_quantity[$key],
                    'delivery_quantity' => $request->delivery_quantity[$key],
                    'receiving_quantity' => $request->receiving_qty[$key],
                    'roll_no' => $request->roll_no[$key],
                    'uom' => $request->uom[$key],
                    'remarks' => $request->remarks[$key],
                ];
            }
            DB::table('stockout_details')->insert($data);
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect()->route('stockoutget');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }


    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $stock = Stockout::findOrFail($id);
            $stock->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('stockout');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function getStyle($id)
    {
        return Style::where('name', $id)->get();
    }

    public function stockoutValue(Request $request)
    {
//        return Stockin::with("buyer","style","zalopo")->where('id',$request->id)->first();
        return Stockin::with("racklist")->where('id', $request->id)->first();
    }


    public function fabric($id) // for dependency dropdown in stockout
    {
        return Stockindetail::with("Fabriccomposition")->where('color_id', $id)->get();
    }

    public function gsm($id) // for dependency dropdown in stockout
    {
        return Stockindetail::where('fabriccomposition_id', $id)->get();

    }

    public function dia($id) // for dependency dropdown in stockout
    {
        return Stockindetail::where('id', $id)->get();

    }

    public function booking($id) // for dependency dropdown in stockout
    {
        return Stockindetail::where('id', $id)->get();

    }

    public function receiving($id)
    {
        return Stockindetail::where('id', $id)->get();
    }

    public function viewStockout($id)
    {
        $stockout = Stockout::get()->where('id', $id);

        $stockout_details = StockoutDetail::get()->where('stockout_id', $id);
        return view('lab::pages.stockoutview', compact('stockout', 'stockout_details'));
    }


}
