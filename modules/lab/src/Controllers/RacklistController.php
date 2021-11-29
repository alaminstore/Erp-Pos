<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session,Exception;
use SkylarkSoft\GoRMG\Lab\Models\Racklist;
use SkylarkSoft\GoRMG\Lab\Requests\RacklistRequest;

class RacklistController extends Controller
{
    public function index()
    {
        $racklists = Racklist::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.racklist')->with('racklists', $racklists);
    }

    public function create()
    {
        $racklist = null;
        return view('lab::forms.racklist', ['racklist' => $racklist]);
    }
//
    public function edit($id)
    {
        $racklist = Racklist::where('id', $id)->first();
        return view('lab::forms.racklist', ['racklist' => $racklist]);
    }

    public function store(RacklistRequest $request)
    {
        try {
            DB::beginTransaction();
            $racklist = new Racklist();
            $racklist->name = $request->name;
            $racklist->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('racklist');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, RacklistRequest $request)
    {
        try {
            DB::beginTransaction();
            $racklist = Racklist::findOrFail($id);
            $racklist->name = $request->name;
            $racklist->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('racklist');

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
            $racklist = Racklist::findOrFail($id);
            $racklist->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('racklist');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
