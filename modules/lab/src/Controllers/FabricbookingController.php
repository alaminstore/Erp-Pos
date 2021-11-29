<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;
use SkylarkSoft\GoRMG\Lab\Models\Color;
use SkylarkSoft\GoRMG\Lab\Models\Fabriccomposition;
use SkylarkSoft\GoRMG\Lab\Models\Season;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Models\Fabricbooking;
use SkylarkSoft\GoRMG\Lab\Models\Fabricbook;
use SkylarkSoft\GoRMG\Lab\Models\Supplier;
use SkylarkSoft\GoRMG\Lab\Models\Zalopo;
use SkylarkSoft\GoRMG\Lab\Requests\FabricbookingRequest;

class FabricbookingController extends Controller
{
    public function index()
    {
        $fabricbookings = Fabricbooking::with('fabricbooking_details')->orderBy('id', 'desc')->paginate();

        return view('lab::pages.fabricbooking')->with('fabricbookings', $fabricbookings);

    }

    public function create()
    {
        $fabricbooking = null;
        $buyers = Buyer::all()->pluck('name', 'id');
        $supplier = Supplier::all()->pluck('name', 'id');
        $season = Season::all()->pluck('name', 'id');
        $zalopo = Style::all()->pluck('name', 'id');
        $style = Zalopo::all()->pluck('zalopo', 'id');
        $fabric_comp = Fabriccomposition::all()->pluck('name', 'id');
        $color = Color::all()->pluck('name', 'id');
        return view('lab::forms.fabricbooking', [

            'fabricbooking' => $fabricbooking,
            'buyers' => $buyers,
            'supplier' => $supplier,
            'season' => $season,
            'zalopo' => $zalopo,
            'style' => $style,
            'fabric_comp' => $fabric_comp,
            'color' => $color,
        ]);
    }

    public function edit($id)
    {
        $fabricbooking = Fabricbooking::where('id', $id)->first();
        $supplier = Supplier::all()->pluck('name', 'id');
        $season = Season::all()->pluck('name', 'id');
        $zalopo = Zalopo::all()->pluck('zalopo', 'id');
        $style = Style::all()->pluck('style', 'id');
        $fabric_comp = Fabriccomposition::all()->pluck('name', 'id');
        $color = Color::all()->pluck('name', 'id');
        return view('lab::forms.fabricbooking', [
            'fabricbooking' => $fabricbooking,
            'supplier' => $supplier,
            'season' => $season,
            'zalopo' => $zalopo,
            'style' => $style,
            'fabric_comp' => $fabric_comp,
            'color' => $color,
        ]);
    }

    public function store(FabricbookingRequest $request)
    {

       try {
        DB::beginTransaction();
        $fabricbooking = new Fabricbooking();
        $fabricbooking->sid = $request->sid;
        $fabricbooking->supplier_id = $request->supplier_id;
        $fabricbooking->season_id = $request->season_id;
        $fabricbooking->uom = $request->uom;
        $fabricbooking->lc = $request->lc;
        $fabricbooking->date = $request->date;
        $fabricbooking->fabric = $request->fabric;
        $fabricbooking->save();
        $fabricId = $fabricbooking->id;
        $fabricSid = $fabricbooking->sid;
        $fabric =  $fabricbooking->fabric;
        $fabric_uom = $fabricbooking->uom;
        $data = [];
        foreach ($request->buyer_id as $key => $buyer_id) {
            $data[] = [
                'fabric_booking_id' => $fabricId,
                'sid' => $fabricSid,
                'buyer_id' => $request->buyer_id[$key],
                'style_id' => $request->style_id[$key],
                'zalopo_id' => $request->zalopo_id[$key],
                'color_id' => $request->color_id[$key],
                'fabriccomposition_id' => $request->fabriccomposition_id[$key],
                'gsm' => $request->gsm[$key],
                'dia' => $request->dia[$key],
                'booking_qty' => $request->booking_qty[$key],
                'value' => $request->value[$key],
                'remarks' => $request->remarks[$key],
                'fabric_type' => $fabric,
                'uom' => $fabric_uom,

            ];
        }
        DB::table('fabric-booking-details')->insert($data);
        DB::commit();
        Session::flash('alert-success', 'Data Stored Successfully!!');
        return redirect('fabricbooking');

        }catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, FabricbookingRequest $request)
    {
        try {
            DB::beginTransaction();
            $fabricbooking = Fabricbooking::findOrFail($id);
            $fabricbooking->style_id = $request->style_id;
            $fabricbooking->zalopo_id = $request->zalopo_id;
            $fabricbooking->season_id = $request->season_id;
            $fabricbooking->supplier_id = $request->supplier_id;
            $fabricbooking->lc = $request->lc;
            $fabricbooking->booking_qty = $request->booking_qty;
            $fabricbooking->value = $request->value;
            $fabricbooking->color_id = $request->color_id;
            $fabricbooking->fabriccomposition_id = $request->fabriccomposition_id;
            $fabricbooking->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('fabricbooking');

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
            $fabricbooking = Fabricbooking::findOrFail($id);
            $fabricbooking->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('fabricbooking');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }


    public function viewFabricBooking($id){
//        $fabricbooking = Fabricbooking::with('fabricbooking_details')->get()->where('id',$id);
        $fabricbooking = Fabricbooking::get()->where('id',$id);
        $fabricbooking_details = FabricBook::get()->where('fabric_booking_id',$id);
        return view('lab::pages.fabricbookingview',compact('fabricbooking','fabricbooking_details'));
    }


}
