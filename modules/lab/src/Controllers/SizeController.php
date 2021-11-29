<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Size;
use SkylarkSoft\GoRMG\Lab\Requests\SizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.sizes')->with('sizes', $sizes);
    }

    public function create()
    {
        $size = null;
        return view('lab::forms.size', ['size' => $size]);
    }

    public function edit($id)
    {
        $size = Size::where('id', $id)->first();
        return view('lab::forms.size', ['size' => $size]);
    }

    public function store(SizeRequest $request)
    {
        try {
            DB::beginTransaction();
            $size = new Size();
            $size->name = $request->name;
            $size->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('sizes');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function update($id, SizeRequest $request)
    {
        try {
            DB::beginTransaction();
            $size = Size::findOrFail($id);
            $size->name = $request->name;
            $size->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('sizes');

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
            $size = Size::findOrFail($id);
            $size->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('sizes');
        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!');
            return redirect()->back();
        }
    }
}
