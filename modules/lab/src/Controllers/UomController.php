<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session,Exception;
use SkylarkSoft\GoRMG\Lab\Models\Uom;
use SkylarkSoft\GoRMG\Lab\Requests\UomRequest;

class UomController extends Controller
{
    public function index()
    {
        $uoms = Uom::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.uom')->with('uoms', $uoms);
    }

    public function create()
    {
        $uom = null;
        return view('lab::forms.uom', ['uom' => $uom]);
    }

    public function edit($id)
    {
        $uom = Uom::where('id', $id)->first();
        return view('lab::forms.uom', ['uom' => $uom]);
    }

    public function store(UomRequest $request)
    {
        try {
            DB::beginTransaction();
            $uom = new Uom();
            $uom->name = $request->name;
            $uom->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('uom');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, UomRequest $request)
    {
        try {
            DB::beginTransaction();
            $uom = Uom::findOrFail($id);
            $uom->name = $request->name;
            $uom->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('uom');

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
            $uom = Uom::findOrFail($id);
            $uom->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('uom');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
