<?php

namespace App\Services;

class TemporaryFileService 
{
    public static function createImage($file)
    {
        $imageName = now().$file->getClientOriginalName();
        $file->move(public_path('images'), $imageName);
        return $imageName;
    }
}