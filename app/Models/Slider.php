<?php 
namespace App\Models;

use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public static $slider;
    public static $imageName;
    public static $imageExtension;
    public static $directory;
    public static $lastImage;
    public static $firstSize;
    public static $secondSize;


public static function sliderBsicInfo($request){

    self::$directory  = 'slider-image/';
    self::$firstSize = 800;
    self::$secondSize = 500;

     self::$slider->small_title    = $request->small_title;
     self::$slider->title          = $request->title;
     self::$slider->description    = $request->description;
     if ($request->file('image')) {
        self::$slider->image          = imageUpload($request->file('image'),$request->title,self::$firstSize,self::$secondSize,self::$directory);
     } 
     self::$slider->price          = $request->price;
     self::$slider->button_text    = $request->button_text;
     self::$slider->button_link    = $request->button_link;
     self::$slider->save();
}
 

public static function newSlider($request)
{
    self::$slider = new Slider();
    self::sliderBsicInfo($request);
}
public static function updatSlider($request,$id)
{
   self::$slider    = Slider::find($id);  
   self::sliderBsicInfo($request);
}





}//
