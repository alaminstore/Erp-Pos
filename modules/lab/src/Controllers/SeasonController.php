<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Season;
use SkylarkSoft\GoRMG\Lab\Requests\SeasonRequest;


class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.season')->with('seasons', $seasons);
    }

    public function create()
    {
        $season = null;
        return view('lab::forms.season', ['season' => $season]);
    }
//
    public function edit($id)
    {
        $season = Season::where('id', $id)->first();
        return view('lab::forms.season', ['season' => $season]);
    }

    public function store(SeasonRequest $request)
    {
        try {
            DB::beginTransaction();
            $season = new Season();
            $season->name = $request->name;
            $season->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('season');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
//
    public function update($id, SeasonRequest $request)
    {
        try {
            DB::beginTransaction();
            $session = Season::findOrFail($id);
            $session->name = $request->name;
            $session->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('season');

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
            $session = Season::findOrFail($id);
            $session->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('season');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
