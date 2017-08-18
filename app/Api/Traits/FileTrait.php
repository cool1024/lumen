<?php

/*
 * file:    FileTrait.php
 * author:  xiaojian
 * date:    2017-08-12
 * exp:     some useful function for file save
 */

namespace App\Api\Traits;

use Illuminate\Support\Facades\Request;

trait FileTrait
{
    protected static $file_path="";

    public function saveTo($name, $path)
    {
        if (self::fileIsReady($name)) {
            $file=Request::file($name);               
            $filename=sprintf("%s.%s",self::getFileNameByMd5($file),$file->getClientOriginalExtension());
            $file->move(self::$file_path.$path,$filename);
            return sprintf("%s/%s",self::$file_path.$path,$filename);
        } else {
            return "file upload error";
        }
    }

    public function saveImageTo($name, $path)
    {
        if (self::fileIsReady($name)) {
            $file=Request::file($name);
            $regx='/^image/';
            if (preg_match($regx, $file->getMimeType())) {
                $filename=sprintf("%s.%s",self::getFileNameByMd5($file),$file->getClientOriginalExtension());
                $file->move(self::$file_path.$path,$filename);
                return sprintf("%s/%s",self::$file_path.$path,$filename);
            } else {
                return "image type error";
            }
        } else {
            return "image upload error";
        }
    }

    public function getFileNameByMd5($file){
        $filename=$file->getRealPath();
        return md5_file($filename);
    }

    public function fileIsReady($name)
    {
        return Request::hasFile($name)&&Request::file($name)->isValid();
    }
}
