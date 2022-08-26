<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Shipping;
use Darryldecode\Cart\Cart;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{

public $orderId;
public $cartItems;

public function orderSubmit(Request $request)
{ 
    if (Session::get('advance_amount')) {
        DB::beginTransaction();
 

        try {

           Order::newOrder($request);
           Shipping::newOrderShippingInfo($request);
           Payment::newOrderPaymentInfo($request);  
           $this->cartItems = \Cart::getContent();
        foreach ($this->cartItems as $item) {
            OrderDetails::newOrderDetails($request,$item);
        } 
            DB::commit();
            // all good
            \Cart::clear();
            Session::forget('order_id');
            Session::forget('advance_amount');
            Session::forget('pay_with');
            Session::forget('transition_id');

            Alert::success('Order Successfull','Now you relax and waiting for confirmation sir!');
            return redirect('/');
            
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error("Missing something","Please fill the all of information form");
            return redirect()->back();
        } 
     }else{
        Alert::info("Not found payment","Maybe you do not payment that'swhy won't be place an order");
        return redirect()->back();
     }




       
}
}//
