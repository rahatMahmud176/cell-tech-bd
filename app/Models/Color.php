<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    public static $color;




    public static function basicInfo($request)
    {
         
            self::$color->title   = $request->title;
            self::$color->code   = $request->code;
            self::$color->save(); 
    }



    public static function newColor($request)
    {
        self::$color     =new Color();
        self::basicInfo($request);
    } 

}
