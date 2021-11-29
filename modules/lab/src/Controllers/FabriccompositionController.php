<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SkylarkSoft\GoRMG\Lab\Models\Fabriccomposition;
use SkylarkSoft\GoRMG\Lab\Requests\FabriccompositionRequest;
use Session, Exception;

class FabriccompositionController extends Controller
{
    public function index()
    {
        $fabrics = Fabriccomposition::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.fabrical')->with('fabrics', $fabrics);
    }

    public function create()
    {
        $fabric = null;
        return view('lab::forms.fabrical', ['fabric' => $fabric]);
    }

    public function edit($id)
    {
        $fabric = Fabriccomposition::where('id', $id)->first();
        return view('lab::forms.fabrical', ['fabric' => $fabric]);
    }

    public function store(FabriccompositionRequest $request)
    {
        try {
            DB::beginTransaction();
            $fabric = new Fabriccomposition();
            $fabric->name = $request->name;
            $fabric->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('fabric');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
//
    public function update($id, FabriccompositionRequest $request)
    {
        try {
            DB::beginTransaction();
            $fabric = Fabriccomposition::findOrFail($id);
            $fabric->name = $request->name;
            $fabric->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('fabric');

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
            $fabric = Fabriccomposition::findOrFail($id);
            $fabric->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('fabric');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
