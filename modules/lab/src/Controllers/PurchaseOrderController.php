<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;
use SkylarkSoft\GoRMG\Lab\Models\PurchaseOrder;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Requests\PurchaseOrderRequest;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchase_orders = PurchaseOrder::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.purchase_orders')->with('purchase_orders', $purchase_orders);
    }

    public function create()
    {
        $purchase_order = null;
        $buyers = Buyer::all()->pluck('name', 'id');
        return view('lab::forms.purchase_order', [
            'purchase_order' => $purchase_order,
            'buyers' => $buyers,
        ]);
    }

    public function edit($id)
    {
        $purchase_order = PurchaseOrder::where('id', $id)->first();
        $buyers = Buyer::all()->pluck('name', 'id');
        $styles = Style::where('buyer_id', $purchase_order->buyer_id)->pluck('booking_no', 'id');
        return view('lab::forms.purchase_order', [
            'purchase_order' => $purchase_order,
            'buyers' => $buyers,
            'styles' => $styles,
        ]);
    }

    public function store(PurchaseOrderRequest $request)
    {
//        try {
            DB::beginTransaction();
            $purchase_order = new PurchaseOrder();
            $purchase_order->buyer_id = $request->buyer_id;
            $purchase_order->style_id = $request->style_id;
            $purchase_order->name = $request->name;
            $purchase_order->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('purchase-orders');

        /*} catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }*/
    }

    public function update($id, PurchaseOrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $purchase_order = PurchaseOrder::findOrFail($id);
            $purchase_order->buyer_id = $request->buyer_id;
            $purchase_order->style_id = $request->style_id;
            $purchase_order->name = $request->name;
            $purchase_order->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('purchase-orders');

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
            $purchase_order = PurchaseOrder::findOrFail($id);
            $purchase_order->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('purchase-orders');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
