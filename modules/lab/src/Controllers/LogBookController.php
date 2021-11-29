<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session, DB, Exception;
use SkylarkSoft\GoRMG\Lab\Models\LogBook;
use SkylarkSoft\GoRMG\Lab\Models\Requisition;

class LogBookController extends Controller
{
    public function index()
    {
        $log_books = LogBook::orderBy('id', 'DESC')->paginate();
        return view('lab::pages.log_books', ['log_books' => $log_books]);
    }

    public function create(Request $request)
    {
        $requisition_id = $request->requisition_id ?? null;
        $requisition_data = null;
        if ($requisition_id) {
            $requisition_data = Requisition::findOrFail($requisition_id);
        }
        $requisitions = Requisition::orderBy('id', 'DESC')->pluck('receive_no', 'id');
        return view('lab::forms.log_book', [
            'log_book' => null,
            'requisitions' => $requisitions,
            'requisition_id' => $requisition_id,
            'requisition_data' => $requisition_data
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'requisition_id' => 'required'
        ], [
            'requisition_id.required' => 'Receive No is required'
        ]);
        try {
            DB::beginTransaction();
            $log_book = new LogBook();
            $log_book->requisition_id = $request->requisition_id;
            $log_book->reference_no = $request->reference_no;
            $log_book->shift = $request->shift;
            $log_book->fabric_type = $request->fabric_type;
            $log_book->roll = $request->roll;
            $log_book->time = $request->time;
            $log_book->dyeing_procedure = $request->dyeing_procedure;
            $log_book->cf_to_wash = $request->cf_to_wash;
            $log_book->cf_to_water = $request->cf_to_water;
            $log_book->cf_to_perspiration = $request->cf_to_perspiration;
            $log_book->pilling = $request->pilling;
            $log_book->bursting = $request->bursting;
            $log_book->shrinkage_l_w = $request->shrinkage_l_w;
            $log_book->shrinkage_w_w = $request->shrinkage_w_w;
            $log_book->shrinkage_sp_percentage = $request->shrinkage_sp_percentage;
            $log_book->cf_to_rubbing_dry = $request->cf_to_rubbing_dry;
            $log_book->cf_to_rubbing_wet = $request->cf_to_rubbing_wet;
            $log_book->r_width = $request->r_width;
            $log_book->t_width = $request->t_width;
            $log_book->r_gsm = $request->r_gsm;
            $log_book->f_gsm = $request->f_gsm;
            $log_book->report_to_qc_time = $request->report_to_qc_time;
            $log_book->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('log-books');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $log_book = LogBook::findOrFail($id);
        $requisitions = Requisition::orderBy('id', 'DESC')->pluck('receive_no', 'id');
        return view('lab::forms.log_book', [
            'log_book' => $log_book,
            'requisitions' => $requisitions,
            'requisition_id' => null,
            'requisition_data' => null
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'requisition_id' => 'required'
        ], [
            'requisition_id.required' => 'Receive No is required'
        ]);
        try {
            DB::beginTransaction();
            $log_book = LogBook::findOrFail($id);
            $log_book->requisition_id = $request->requisition_id;
            $log_book->reference_no = $request->reference_no;
            $log_book->shift = $request->shift;
            $log_book->fabric_type = $request->fabric_type;
            $log_book->roll = $request->roll;
            $log_book->time = $request->time;
            $log_book->dyeing_procedure = $request->dyeing_procedure;
            $log_book->cf_to_wash = $request->cf_to_wash;
            $log_book->cf_to_water = $request->cf_to_water;
            $log_book->cf_to_perspiration = $request->cf_to_perspiration;
            $log_book->pilling = $request->pilling;
            $log_book->bursting = $request->bursting;
            $log_book->shrinkage_l_w = $request->shrinkage_l_w;
            $log_book->shrinkage_w_w = $request->shrinkage_w_w;
            $log_book->shrinkage_sp_percentage = $request->shrinkage_sp_percentage;
            $log_book->cf_to_rubbing_dry = $request->cf_to_rubbing_dry;
            $log_book->cf_to_rubbing_wet = $request->cf_to_rubbing_wet;
            $log_book->r_width = $request->r_width;
            $log_book->t_width = $request->t_width;
            $log_book->r_gsm = $request->r_gsm;
            $log_book->f_gsm = $request->f_gsm;
            $log_book->report_to_qc_time = $request->report_to_qc_time;
            $log_book->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('log-books');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function destroy($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $log_book = LogBook::findOrFail($id);
            $log_book->delete();
            DB::commit();
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('log-books');
        } catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}