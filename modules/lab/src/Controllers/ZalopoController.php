<?php


namespace SkylarkSoft\GoRMG\Lab\Controllers;

use Illuminate\Http\Request;
use Session,Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Models\Zalopo;
use SkylarkSoft\GoRMG\Lab\Requests\ZalopoRequest;

class ZalopoController extends Controller
{
    public function index(){
        $zalopos = Zalopo::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.zalopo')->with('zalopos', $zalopos);
    }
    public function create()
    {
        $zalopo = null;
        $buyers = Buyer::all()->pluck('name', 'id');
        $styles = Style::all()->pluck('style','id');
        return view('lab::forms.zalopo', [
            'zalopo'=> $zalopo,
            'styles' => $styles,
            'buyers' => $buyers
        ]);
    }

    public function edit($id)
    {
        $zalopo = Zalopo::where('id', $id)->first();
        $buyers = Buyer::all()->pluck('name', 'id');
        $styles = Style::all()->pluck('style','id');
        return view('lab::forms.zalopo', [
            'zalopo'=>$zalopo,
            'buyers'=>$buyers,
            'styles'=>$styles

        ]);

    }

    public function store(ZalopoRequest $request)
    {
        try {
            DB::beginTransaction();
            $zalopo = new Zalopo();
            $zalopo->name = $request->name;
            $zalopo->style = $request->style;
            $zalopo->zalopo = $request->zalopo;
            $zalopo->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('zalopo');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, ZalopoRequest $request)
    {
        try {
            DB::beginTransaction();
            $zalopo = Zalopo::findOrFail($id);

            $zalopo->name = $request->name;
            $zalopo->style = $request->style;
            $zalopo->zalopo = $request->zalopo;
            $zalopo->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('zalopo');

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
            $zalopo = Zalopo::findOrFail($id);
            $zalopo->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('zalopo');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function getZalopo($id)
    {
        return Style::where('name', $id)->get();
    }
    public function getStyle($id)
    {
        return Zalopo::where('style', $id)->get();
    }
}
