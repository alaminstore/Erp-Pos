<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Color;
use SkylarkSoft\GoRMG\Lab\Requests\ColorRequest;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.colors')->with('colors', $colors);
    }

    public function create()
    {
        $color = null;
        return view('lab::forms.color', ['color' => $color]);
    }

    public function edit($id)
    {
        $color = Color::where('id', $id)->first();
        return view('lab::forms.color', ['color' => $color]);
    }

    public function store(ColorRequest $request)
    {
        try {
            DB::beginTransaction();
            $color = new Color();
            $color->name = $request->name;
            $color->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('colors');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, ColorRequest $request)
    {
        try {
            DB::beginTransaction();
            $color = Color::findOrFail($id);
            $color->name = $request->name;
            $color->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('colors');

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
            $color = Color::findOrFail($id);
            $color->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('colors');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
