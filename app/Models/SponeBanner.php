<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponeBanner extends Model
{
    use HasFactory;
    public static $sponebanner;


    public static function basicInfo($request)
    {
        self::$sponebanner->title          =$request->title;
        self::$sponebanner->description     =$request->description;
        if ($request->file('image')) {
            self::$sponebanner->image           =imageUpload($request->file('image'),$request->header,512,600,'special-offer-one-banner-image/');
        }
        self::$sponebanner->price           =$request->price;
        self::$sponebanner->button_text     =$request->button_text;
        self::$sponebanner->button_link     =$request->button_link;
        self::$sponebanner->save();
    }
    
    public static function newSponeBanner($request)
    {
        self::$sponebanner   = new SponeBanner();
        self::basicInfo($request);
    }
    
    
    public static function sponebannerUpdate($request,$id)
    {
        self::$sponebanner   = SponeBanner::find($id);
        self::basicInfo($request);
    }
}
