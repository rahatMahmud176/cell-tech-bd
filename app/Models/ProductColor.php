<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    public static $color;


    public static function newProductColor($productId,$color)
    {
        self::$color   = new ProductColor();
        self::$color->product_id     = $productId;
        self::$color->color_id       = $color;
        self::$color->save();
    }



public function colors()
{
    return $this->belongsTo('App\Models\Color','color_id');
}





}
