<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session, Validation, Auth;
use DB, Exception;
use SkylarkSoft\GoRMG\Lab\Models\Company;
use SkylarkSoft\GoRMG\Lab\Models\User;
use SkylarkSoft\GoRMG\Lab\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate();
        return view('lab::pages.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name', 'id')->all();

        return view('lab::forms.user', [
            'user' => null,
            'companies' => $companies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'department' => 'nullable',
            'company_id' => 'nullable|numeric',
            'email' => 'required|unique:users|max:55',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ], [
            'company_id.required' => "Company is required"
        ]);

        try {
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->screen_name = $request->first_name . ' ' . $request->last_name;
            $user->designation = $request->designation;
            $user->address = $request->address;
            $user->phone_no = $request->phone_no;
            $user->company_id = $request->company_id;
            $user->department = $request->department;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();
            Session::flash('alert-success', 'Successfully created');
            return redirect('/users');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something wrong! Please try again');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $companies = Company::pluck('name', 'id')->all();

        return view('lab::forms.user', [
            'user' => $user,
            'companies' => $companies,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        try {
            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->screen_name = $request->first_name . ' ' . $request->last_name;
            $user->designation = $request->designation;
            $user->address = $request->address;
            $user->phone_no = $request->phone_no;
            $user->company_id = $request->company_id;
            $user->department = $request->department;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            Session::flash('alert-success', 'Data Updated Successfully');
            return redirect('/users');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something wrong!! Please try again');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->id == $id) {
            Session::flash('alert-danger', 'Sorry you cannot delete your account!');
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            $company = User::findOrFail($id);
            $company->delete();
            DB::commit();
            Session::flash('alert-success', 'Data Deleted Successfully!!');
            return redirect()->back();
        } catch(Exception $e) {
            DB::rollback();
            Session::flash('alert-danger', 'Something went wrong!! ERROR CODE: Company.D-102');
            return redirect()->back();
        }

    }

    public function searchUsers(Request $request)
    {
        $users = User::with('company:id,name')
            ->join('companies', 'companies.id', '=', 'users.company_id')
            ->where('users.first_name', 'like', '%' . $request->q . '%')
            ->orWhere('users.last_name', 'like', '%' . $request->q . '%')
            ->orWhere('users.designation', 'like', '%' . $request->q . '%')
            ->orWhere('users.address', 'like', '%' . $request->q . '%')
            ->orWhere('users.phone_no', 'like', '%' . $request->q . '%')
            ->orWhere('users.email', 'like', '%' . $request->q . '%')
            ->orWhere('companies.name', 'like', '%' . $request->q . '%')
            ->orWhere('users.department', 'like', '%' . $request->q . '%')
            ->select('users.*')
            ->orderBy('users.id', 'DESC')
            ->paginate();

        return view('lab::pages.users', ['users' => $users, 'q' => $request->q]);
    }
}