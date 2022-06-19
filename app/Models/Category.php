<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public static $category;




    public static function basicInfo($request)
    {
        if ($request->file('image')) {
            self::$category->image   = imageUpload($request->file('image'),$request->title,201,204,'category-img/');
        }
            self::$category->title   = $request->title;
            self::$category->save(); 
    }



    public static function newCategory($request)
    {
        self::$category     =new Category();
        self::basicInfo($request);
    }

    public static function updateCategory($request,$id)
    {
        self::$category = Category::find($id);
        self::basicInfo($request);
    }



public function category_brand()
{
    return $this->hasMany('App\Models\Brand','category_id')->take('5');
}







}
