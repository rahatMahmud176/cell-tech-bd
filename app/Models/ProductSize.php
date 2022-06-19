<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    public static $size;

public static function newProductSize($productId,$size)
{
    self::$size   = new ProductSize();
    self::$size->product_id     = $productId;
    self::$size->size_id        = $size;
    self::$size->save();
}

public function sizes()
{
    return $this->belongsTo('App\Models\Size','size_id');
}


}
