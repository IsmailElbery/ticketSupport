<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\File;

class FileHelper
{


    public static function uploadBaseFile($file, $pathToUpload, $fileName )
    {
        # code...
        $info = pathinfo($fileName);
        $ext = $info['extension'];
         // your base64 encoded
         $file = substr($file, strpos($file, ",")+1);
        $NewfileName = time() . rand(11111, 99999).'.'.$ext;
        $filePath = $pathToUpload . $NewfileName;
        File::put(public_path($filePath), base64_decode($file));
       // Storage::disk('desk2')->put($filePath, base64_decode($file));
        return $filePath;
    }

}
