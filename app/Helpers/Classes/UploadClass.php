<?php 

namespace App\Helpers\Classes;

use Image;
class UploadClass
{
	
	public static function uploadFile($request,$name_file,$path,$all=null,$s_w,$s_h,$m_w,$m_h)
	{
        
        // upload one file and return name of this file after change the name of this file  
            // create instanc

        // add more size of image ( small , medium , big )
        if($all)
        {
            // small -> in small folder
            Image::make($request->$name_file)->resize($s_w, $s_h, function ($constraint)
            {
                $constraint->aspectRatio();
            })->save($path.'small/'.$request->$name_file->getClientOriginalName());


            // medium -> in medium folder
            Image::make($request->$name_file)->resize($m_w, $m_h, function ($constraint)
            {
                $constraint->aspectRatio();
            })->save($path.'medium/'.$request->$name_file->getClientOriginalName());

            //  big  -> in the root of path
            // upload image using intervention without resizeing
            $img = Image::make($request->$name_file);
            // save image
            $img->save($path.$request->$name_file->getClientOriginalName());


//            Image::make($request->$name_file)->resize($b_w, $b_h, function ($constraint)
//            {
//                $constraint->aspectRatio();
//            })->save($path.$request->$name_file->hashName());

        }
        else
        {
            Image::make($request->$name_file)->resize($s_w, $s_h, function ($constraint)
            {
                $constraint->aspectRatio();
            })->save($path.$request->$name_file->getClientOriginalName());

        }


        return $request->$name_file->getClientOriginalName();
     
	}

    //    upload image with resizing and withoutResize
    public  static  function uploadMultiImage($image,$path,$s=400,$m=600)
    {
        // medium -> in medium folder
        Image::make($image)->resize($m, null, function ($constraint)
        {
            $constraint->aspectRatio();
        })->save($path.'medium/'.$image->getClientOriginalName());

        
        // small -> in small folder
        Image::make($image)->resize($s, null, function ($constraint)
        {
            $constraint->aspectRatio();
        })->save($path.'small/'.$image->getClientOriginalName());


        // upload image using intervention without resizeing
        $img = Image::make($image);
        // save image
        $img->save($path.$image->getClientOriginalName());

        return $image->getClientOriginalName();
    }





    public static function uploadOneImage($request,$name_file,$path,$w,$h=null)
    {
        Image::make($request->$name_file)->resize($w, $h, function ($constraint)
        {
            // $constraint->aspectRatio();
        })->save($path.$request->$name_file->hashName());
        return $request->$name_file->hashName();
    }

    //  upload  one image without resizing

    public static function uploadRealImage($request,$name_file,$path)
    {
        $img = Image::make($request->$name_file);
        // save image
        $img->save($path.$request->$name_file->getClientOriginalName());
        return $request->$name_file->getClientOriginalName();
    }



}
