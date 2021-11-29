<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SkylarkSoft\GoRMG\Lab\Models\Supplier;
use SkylarkSoft\GoRMG\Lab\Requests\SupplierRequest;
use Session, Exception;
class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.supplier')->with('suppliers', $suppliers);
    }
    public function create()
    {
        $supplier = null;
        return view('lab::forms.supplier', ['supplier' => $supplier]);
    }

    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        return view('lab::forms.supplier', ['supplier' => $supplier]);
    }

    public function store(SupplierRequest $request)
    {
        try {
            DB::beginTransaction();
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('suppliers');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, SupplierRequest $request)
    {
        try {
            DB::beginTransaction();
            $supplier = Supplier::findOrFail($id);
            $supplier->name = $request->name;
            $supplier->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('suppliers');

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
            $supplier = Supplier::findOrFail($id);
            $supplier->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('suppliers');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
