<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
public function dashboard( )
{
     return view('back-end.dashbord.dashbord');
}
public function login( )
{
    return view('back-end.auth.login-page');
}
public function register( )
{
    return view('back-end.auth.register-page');

}
}//Controller
