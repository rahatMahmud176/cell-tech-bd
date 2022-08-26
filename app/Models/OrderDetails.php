<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'product_price',
        'color_id',
        'size_id',
        'product_qty',
    ];
public static $orderDetails;
public static $cart;
public static function newOrderDetails($request,$item) { 
    self::$orderDetails                = new OrderDetails();
    self::$orderDetails->order_id      = Session::get('order_id');
    self::$orderDetails->product_id    = $item->id;
    self::$orderDetails->product_name  = $item->name;
    self::$orderDetails->product_price = $item->price;
    self::$orderDetails->color_id      = $item->attributes->color_id;
    self::$orderDetails->size_id       = $item->attributes->size_id;
    self::$orderDetails->product_qty   = $item->quantity;
    self::$orderDetails->save();
}


}
