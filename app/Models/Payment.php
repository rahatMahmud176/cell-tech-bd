<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'transition_id',
    ];
public static $pay;
public static function newOrderPaymentInfo($request)
{
     self::$pay         = new Payment();
     self::$pay->order_id       = Session::get('order_id');
     self::$pay->payment_method = Session::get('pay_with');
     self::$pay->amount         = Session::get('advance_amount');
     self::$pay->transition_id  = Session::get('transition_id');
     self::$pay->save();
}

}//
