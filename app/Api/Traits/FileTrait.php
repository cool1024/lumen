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

    //获取文件的MD5值
    public function getFileNameByMd5($file)
    {
        $filename = $file->getRealPath();
        return md5_file($filename);
    }

    //获取文件文件的随机值(uniqid)
    public function getFileNameByMd5Uniqid()
    {
        return md5(uniqid());
    }

    //获取$request中的指定文件
    public function getInputFile($name)
    {
        return Request::file($name);
    }

    //判断文件是否上传正确
    public function fileIsReady($name)
    {
        return Request::hasFile($name) && Request::file($name)->isValid();
    }

    //判断文件是否是图片
    public function fileIsImage($file)
    {
        $regx = '/^image/';
        return preg_match($regx, $file->getMimeType());
    }

}
