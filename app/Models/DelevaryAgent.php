<?php

namespace App\Models;

use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DelevaryAgent extends Model
{
    use HasFactory;
    public static $agent;
    public static $imageSize;
    public static $directory;
    public static $firstSize;
    public static $secondSize;

public static function basicInfo($request)
{
    self::$firstSize  = 220;
    self::$secondSize = 162;
    self::$directory = 'delevary-agent-image/';

    self::$agent->title        = $request->title;
    self::$agent->image        = imageUpload($request->file('image'),$request->title,self::$firstSize,self::$secondSize,self::$directory);
    self::$agent->save();
}
 
public static function newDelevaryAgent($request)
{
    self::$agent           = new DelevaryAgent();
    self::basicInfo($request);
}



}
