<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_total',
        'status',
    ];

public static $order; 
public static function newOrder($request)
{
    self::$order = new Order();
    self::$order->customer_id    = Session::get('customerId');
    self::$order->order_total    = \Cart::getSubTotal();
    self::$order->save(); 
    
    Session::put('order_id',self::$order->id);
}


public function shipingInfo()
{
    return $this->belongsTo('App\Models\Shipping','id');
}



}
