<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;
    public static $img;

public static function newProductImage($productId,$title,$image)
{
    self::$img   = new ProductImages();
    self::$img->product_id     = $productId;
    self::$img->image          = imageUpload($image,$title,503,336,'product-other-img/');
    self::$img->save();
}
}
