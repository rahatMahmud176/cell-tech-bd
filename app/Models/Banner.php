<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    public static $banner;



public static function newBanner($request)
{
    self::$banner   = new Banner();
    self::$banner->header          =$request->header;
    self::$banner->description     =$request->description;
    self::$banner->image           =imageUpload($request->file('image'),$request->header,620,340,'banner-image/');
    self::$banner->button_text     =$request->button_text;
    self::$banner->button_link     =$request->button_link;
    self::$banner->save();
}





}
