<?php
use Intervention\Image\Facades\Image;

function imageUpload($image,$title,$firstSize,$secondSize,$directory)
{ 
     $imageExtension = $image->getClientOriginalExtension();
     $imageName      = str_replace(' ','-',$title).'-'.time().'.'.$imageExtension; 
     Image::make($image)->resize($firstSize, $secondSize)->save($directory.$imageName);
     return $directory.$imageName;
     
}