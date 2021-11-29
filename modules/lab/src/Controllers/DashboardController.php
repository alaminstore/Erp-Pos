<?php

namespace SkylarkSoft\GoRMG\Lab\Controllers;

use App\Http\Controllers\Controller;
use Session, Cache;

class DashboardController extends Controller
{
    public function index()
    {
        return view('lab::dashboard');
    }
}