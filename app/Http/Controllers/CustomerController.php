<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function loginPage()
   {
     return view('font-end.customer.customer-login');
   }
   public function register()
   {
     return view('font-end.customer.register');
   }
}//
