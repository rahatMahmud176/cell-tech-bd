<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Customer;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
  public $customer;


  
   public function loginPage()
   {
     return view('font-end.customer.customer-login');
   }
   public function register()
   {
     return view('font-end.customer.register');
   }
   public function customerInfoValidate($request)
   {
     $this->validate($request,[
      'first_name'                 => 'required | max:30 ',
      'last_name'                  => 'required | max:30 ',
      'email'                      => 'required',
      'phone_number'               => 'required | between:11,11 ',
      'password'                   => 'required | min:3 | confirmed',
      'password_confirmation'      => 'required | min:3',

     ]);
   }
 public function newCustomer(Request $request)
 {
    $this->customerInfoValidate($request);
    Customer::newCustomer($request);
    return redirect('customer/checkout-page');
 }
public function checkoutPage( )
{
   return view('font-end.cart.checkout',[
    'customerInfo'  => Customer::find(Session::get('customerId')),
   ]);
}
public function customerLogin(Request $request)
{
    $this->customer = Customer::where('phone_number',$request->phone_number)->first();
    if ($this->customer) {
      if (password_verify($request->password, $this->customer->password)) {
         Session::put('customerId', $this->customer->id);
         Session::put('customerFirstName', $this->customer->first_name); 
         Alert::toast('Wellcome back','success');
         return redirect('customer-cart/checkout-page');
    } else {
       Alert::error('Invalid Password','Your password is invalid please input currect password');
       return redirect()->back();
    }
    } else {
      Alert::error("Don't Matching Phone Number ","your phone number is incorrect, please input the currect number");
      return redirect()->back();
    }
    
}
public function customerLogout()
{
    Session::forget('customerFirstName');
    Session::forget('customerId');
    Alert::info('LogOut','Now you are Log out!');
    return redirect()->back();
}

public function advancePayment(Request $request)
{
  Session::put('advance_amount',$request->advance_amount);
  Session::put('pay_with',$request->pay_with);
  Session::put('transition_id',$request->transition_id);
  return redirect()->back();
}
























}//
