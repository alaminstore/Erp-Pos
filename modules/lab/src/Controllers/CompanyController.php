<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use SkylarkSoft\GoRMG\Lab\Models\Company;
use Session;
use SkylarkSoft\GoRMG\Lab\Models\User;
use SkylarkSoft\GoRMG\Lab\Rules\UniqueCompanyRule;

class CompanyController extends Controller
{
    public function index()
    {
        $cmp = Company::orderBy('created_at', 'desc')->paginate();
        return view('lab::pages.companies')->with('companies', $cmp);
    }

    public function create()
    {
        $data['company'] = null;
        return view('lab::forms.company', $data);
    }

    public function edit($id)
    {
        $data['company'] = Company::where('id', $id)->first();
        return view('lab::forms.company', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', new UniqueCompanyRule()],
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $company = new Company();
            $company->name = $request->name;
            $company->address = $request->address;
            $company->responsible_person = $request->responsible_person;
            $company->phone_no = $request->phone_no;
            $company->save();
            DB::commit();
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('companies');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!ERROR CODE CMP.S-101');
            return redirect()->back();
        }
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            $company = Company::findOrFail($id);
            $company->name = $request->name;
            $company->address = $request->address;
            $company->responsible_person = $request->responsible_person;
            $company->phone_no = $request->phone_no;
            $company->save();
            DB::commit();
            Session::flash('alert-success', 'Data Updated Successfully!!');
            return redirect('companies');

        } catch (Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!ERROR CODE CMP.S-101');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if (User::where('company_id', $id)->first()) {
            Session::flash('alert-danger', 'Sorry cannot delete because some user data found under this company!');
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            $company = Company::findOrFail($id);
            $company->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect('companies');
        } catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!! ERROR CODE: Company.D-102');
            return redirect()->back();
        }
    }
}
