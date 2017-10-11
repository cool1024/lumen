<?php
namespace App\Api\Services;

use App\Api\Contracts\FileContract;
use App\Api\Traits\FileTrait;

class FileService implements FileContract
{
    use FileTrait;

    //文件保存路径
    private $file_path = "";

    public function __construct()
    {
        $this->file_path = $_SERVER['DOCUMENT_ROOT'] . '/';
    }

    //修改文件保存路径
    public function setSavePath($path)
    {
        $this->file_path = $path;
    }

    //自动保存文件
    public function saveFileTo($name, $path)
    {
        if (self::fileIsReady($name)) {
            $file = self::getInputFile($name);
            $filename = sprintf("%s.%s", self::getFileNameByMd5Uniqid(), $file->getClientOriginalExtension());
            $file->move($this->file_path . $path, $filename);
            return sprintf("%s/%s", $path, $filename);
        }
        else {
            return "file upload error";
        }
    }

    //自动保存图片
    public function saveImageTo($name, $path)
    {
        if (self::fileIsReady($name)) {

            $file = self::getInputFile($name);

            if (self::fileIsImage($file)) {
                $filename = sprintf("%s.%s", self::getFileNameByMd5Uniqid(), $file->getClientOriginalExtension());
                $file->move($this->file_path . $path, $filename);
                return sprintf("%s/%s", $path, $filename);
            }
            else {
                return "image type error";
            }
        }
        else {
            return "image upload error";
        }
    }
    
    //根据文件MD5值保存图片（避免上传多张重复图片，但是文件一旦删除，所有使用同一图片的页面都将失去这张图，所以这个方法只能用于私有操作）
    public function saveImageByMd5($name, $path)
    {
        if (self::fileIsReady($name)) {

            $file = self::getInputFile($name);

            if (self::fileIsImage($file)) {
                $filename = sprintf("%s.%s", self::getFileNameByMd5($file), $file->getClientOriginalExtension());
                $file->move($this->file_path . $path, $filename);
                return sprintf("%s/%s", $path, $filename);
            }
            else {
                return "image type error";
            }
        }
        else {
            return "image upload error";
        }
    }

     //根据文件MD5值保存文件
    public function saveFileByMd5($name, $path)
    {
        if (self::fileIsReady($name)) {

            $file = self::getInputFile($name);
            $filename = sprintf("%s.%s", self::getFileNameByMd5($file), $file->getClientOriginalExtension());
            $file->move($this->file_path . $path, $filename);
            return sprintf("%s/%s", $path, $filename);
        }
        else {
            return "image upload error";
        }
    }

    //根据文件url删除文件
    public function removeFile($url)
    {
        $filename = "$this->file_path\\$url";
        // dd($filename);
        if (file_exists($filename)) {
            unlink($filename);
            return true;
        }
        else {
            return false;
        }
    }
}
