<?php

namespace App\Models;

use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'phone_number',
    'password'
];
public static $customer;


public static function newCustomer($request)
{
    self::$customer = new Customer();
    self::$customer->first_name    = $request->first_name;
    self::$customer->last_name     = $request->last_name;
    self::$customer->email         = $request->email;
    self::$customer->phone_number  = $request->phone_number;
    self::$customer->password      = bcrypt($request->password);
    self::$customer->save();

    Session::put('customerId', self::$customer->id);
    Session::put('customerFirstName', self::$customer->first_name);
}


}//
