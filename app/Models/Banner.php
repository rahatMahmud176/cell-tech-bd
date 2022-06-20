<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public static $banner;


public static function basicInfo($request)
{
    self::$banner->header          =$request->header;
    self::$banner->description     =$request->description;
    if ($request->file('image')) {
        self::$banner->image           =imageUpload($request->file('image'),$request->header,620,340,'banner-image/');
    }
    self::$banner->button_text     =$request->button_text;
    self::$banner->button_link     =$request->button_link;
    self::$banner->save();
}

public static function newBanner($request)
{
    self::$banner   = new Banner();
    self::basicInfo($request);
}


public static function bannerUpdate($request,$id)
{
    self::$banner   = Banner::find($id);
    self::basicInfo($request);
}


}
