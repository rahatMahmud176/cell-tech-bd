<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'district',
        'upozilla',
        'description',
    ];
public static $shipping;
public static function newOrderShippingInfo($request)
{
    self::$shipping                 = new Shipping();
    self::$shipping->order_id       = Session::get('order_id');
    self::$shipping->first_name     = $request->first_name;
    self::$shipping->last_name      = $request->last_name;
    self::$shipping->phone_number   = $request->phone_number;
    self::$shipping->email          = $request->email;
    self::$shipping->district       = $request->district;
    self::$shipping->upozilla       = $request->upozilla;
    self::$shipping->description    = $request->description;
    self::$shipping->save();
}





















}//
