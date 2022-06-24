<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOfferBanner extends Model
{
    use HasFactory;
    public static $specialofferbanner;


    public static function basicInfo($request)
    {
        self::$specialofferbanner->header          =$request->header;
        self::$specialofferbanner->description     =$request->description;
        if ($request->file('image')) {
            self::$specialofferbanner->image           =imageUpload($request->file('image'),$request->header,736,308,'specialofferbanner-image/');
        }
        self::$specialofferbanner->price           =$request->price;
        self::$specialofferbanner->button_text     =$request->button_text;
        self::$specialofferbanner->button_link     =$request->button_link;
        self::$specialofferbanner->save();
    }
    
    public static function newSpecialOfferBanner($request)
    {
        self::$specialofferbanner   = new SpecialOfferBanner();
        self::basicInfo($request);
    }
    
    
    public static function specialofferbannerUpdate($request,$id)
    {
        self::$specialofferbanner   = SpecialOfferBanner::find($id);
        self::basicInfo($request);
    }
}
