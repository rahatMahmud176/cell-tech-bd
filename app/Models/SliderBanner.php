<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderBanner extends Model
{
    use HasFactory;
    public static $banner;
    public static $imageSize;
    public static $directory;
    public static $firstSize;
    public static $secondSize;

public static function bannerBasicInfo($request)
{
    self::$firstSize = 370;
    self::$secondSize = 250;
    self::$directory = 'slider-banner-img/';
    
    if ($request->file('image')) {
    self::$banner->image                 = imageUpload($request->file('image'),$request->title,self::$firstSize,self::$secondSize,self::$directory);
    }
    self::$banner->product_name          = $request->product_name;
    self::$banner->small_title           = $request->small_title;
    self::$banner->price                 = $request->price;
    self::$banner->header                = $request->header;
    self::$banner->description           = $request->description;
    self::$banner->button_text           = $request->button_text;
    self::$banner->button_link           = $request->button_link; 
    self::$banner->save();
}


public static function newBanner($request)
{
    self::$banner = new SliderBanner();
    self::bannerBasicInfo($request,self::$imageSize);

}





}
