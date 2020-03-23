<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use DateTime;
use Carbon\Carbon;
use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Image;

class GeneralHelper {  
  
    public function adaptiveResize($fileimage, $path ,$filePathName)
    {
        $filename = $fileimage->getClientOriginalName();
        $image = \Image::make($fileimage);
        $image->widen(360);
        Storage::put($path . $filePathName, (string)$image->encode());
    }

    public function processImage($fileimage,$action,$old_name=null)
    {
        if ($fileimage != null){
            $ruta = '/public/';
            $imagenOriginal = $fileimage;

            $imagen = Image::make($imagenOriginal)->resize(250, 150, function($constraint) {
                $constraint->aspectRatio();
            });

            $filename = str_random(15);
            if ($action = 'U'){
                if ($old_name != null){
                    $filename = $old_name;
                }
            }
            
            $temp_name = $filename. '.' . $imagenOriginal->getClientOriginalExtension();
            //$imagen->save($ruta . $temp_name, 90);
            Storage::put($ruta . $temp_name, (string)$imagen->encode());
            
            return $temp_name;
        }       
    }

}
