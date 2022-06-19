<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $product;

public static function basicInfo($request){
     self::$product->title                   = $request->title;
     self::$product->category_id             = $request->category_id;
     self::$product->brand_id                = $request->brand_id;
     self::$product->price                   = $request->price;
     self::$product->sell_price              = $request->sell_price;
     self::$product->short_description       = $request->short_description;
     if ($request->file('image')) {
          self::$product->image                   = imageUpload($request->file('image'),$request->title,600,600,'product-image/');
     } 
     self::$product->description             = $request->description;
     self::$product->created_by             = 0;
     self::$product->updated_by             = 0;
     self::$product->save(); 
     return self::$product->id;
}

public static function newProduct($request)
{
     self::$product = new Product();
     return self::basicInfo($request);
}
public static function UpdateProduct($request,$id)
{
     self::$product = Product::find($id);
    return self::basicInfo($request);
}


public function productColors()
{
     return $this->hasMany('App\Models\ProductColor','product_id');
}

public function productSizes()
{
     return $this->hasMany('App\Models\ProductSize','product_id');
}

public function category( )
{
     return $this->belongsTo('App\Models\Category','category_id');
}



}
