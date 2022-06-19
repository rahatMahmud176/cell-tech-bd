<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public static $brand;




    public static function basicInfo($request)
    {
        if ($request->file('image')) {
            self::$brand->image   = imageUpload($request->file('image'),$request->title,201,204,'brand-img/');
        }else{
            self::$brand->image   = 'no-image';
        }
            self::$brand->title         = $request->title;
            self::$brand->category_id   = $request->category_id;
            self::$brand->save(); 
    }



    public static function newBrand($request)
    {
        self::$brand     =new Brand();
        self::basicInfo($request);
    }

    public static function updateBrand($request,$id)
    {
        self::$brand = Brand::find($id);
        self::basicInfo($request);
    }


public function category()
{
    return $this->belongsTo('app\Models\Category','category_id');
}


}
