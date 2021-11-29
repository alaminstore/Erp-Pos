<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session, Cache;
use SkylarkSoft\GoRMG\Lab\Models\User;
use SkylarkSoft\GoRMG\Lab\Requests\PostLogin;

class AuthenticateController extends Controller
{

    public function login()
    {
        return view('skeleton::login');
    }

    public function postLogin(PostLogin $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            if (Auth::attempt($input)) {
                User::find(Auth::user()->id)->update([
                    'last_login' => Carbon::now()
                ]);


                Session::put('companyId', Auth::user()->company_id);
                // end
                return redirect('dashboard');
            } else {
                session()->flash('error', 'These credentials do not match our records.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Something Went Wrong!');
            return redirect()->back()->withInput()->withErrorMessage($e->getMessage());
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            User::find(Auth::user()->id)->update([
                'status' => false
            ]);
        }
        Auth::logout();
        Session::flush();
        Cache::flush();
        return redirect('login');
    }

}
