<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;
use SkylarkSoft\GoRMG\Lab\Requests\BuyerRequest;

class BuyerController extends Controller
{
    public function index()
    {
        $buyers = Buyer::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.buyers')->with('buyers', $buyers);
    }

    public function create()
    {
        $buyer = null;
        return view('lab::forms.buyer', ['buyer' => $buyer]);
    }

    public function edit($id)
    {
        $buyer = Buyer::where('id', $id)->first();
        return view('lab::forms.buyer', ['buyer' => $buyer]);
    }

    public function store(BuyerRequest $request)
    {
        try {
            DB::beginTransaction();
            $buyer = new Buyer();
            $buyer->name = $request->name;
            $buyer->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('buyers');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, BuyerRequest $request)
    {
        try {
            DB::beginTransaction();
            $buyer = Buyer::findOrFail($id);
            $buyer->name = $request->name;
            $buyer->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('buyers');

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
            $buyer = Buyer::findOrFail($id);
            $buyer->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('buyers');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
