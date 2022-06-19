<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    public static $size;




    public static function basicInfo($request)
    {
         
            self::$size->title   = $request->title; 
            self::$size->save(); 
    }



    public static function newSize($request)
    {
        self::$size     =new Size();
        self::basicInfo($request);
    }

    public static function updateSize($request,$id)
    {
        self::$size = Size::find($id);
        self::basicInfo($request);
    }

}
