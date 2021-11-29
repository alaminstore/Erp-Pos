<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Buyer;
use SkylarkSoft\GoRMG\Lab\Models\Style;
use SkylarkSoft\GoRMG\Lab\Requests\StyleRequest;

class StyleController extends Controller
{
    public function index()
    {
        $styles = Style::orderBy('id', 'desc')->paginate();
        return view('lab::pages.styles')->with('styles', $styles);
    }

    public function create()
    {
        $style = null;
        $buyers = Buyer::all()->pluck('name', 'id');
        //return $buyers;
        return view('lab::forms.style', [
            'style' => $style,
            'buyers' => $buyers
        ]);
    }

    public function edit($id)
    {
        $style = Style::where('id', $id)->first();
        $buyers = Buyer::all()->pluck('name', 'id');
        return view('lab::forms.style', [
            'style' => $style,
            'buyers' => $buyers
        ]);
    }

    public function store(StyleRequest $request)
    {
        try {
            DB::beginTransaction();
            $style = new Style();

            $style->name = $request->name;
            $style->style = $request->style;
            $style->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('styles');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
//
    public function update($id, StyleRequest $request)
    {
        try {
            DB::beginTransaction();
            $style = Style::findOrFail($id);
            $style->name = $request->name;
            $style->style = $request->style;
            $style->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('styles');

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
            $style = Style::findOrFail($id);
            $style->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('styles');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }


    public function getStyle($id)
    {
        return Style::where('name', $id)->get();
    }

}
