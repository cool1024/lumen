<?php
namespace App\Api\Contracts;

interface FileContract
{    

    //修改文件保存路径
    public function setSavePath($path);

    //自动保存文件
    public function saveFileTo($name, $path);
    
    //自动保存图片
    public function saveImageTo($name, $path);
        
    //根据文件MD5值保存图片（避免上传多张重复图片，但是文件一旦删除，所有使用同一图片的页面都将失去这张图，所以这个方法只能用于私有操作）
    public function saveImageByMd5($name, $path);
    
    //根据文件MD5值保存文件
    public function saveFileByMd5($name, $path);

    //删除指定路径的文件
    public function removeFile($url);
}
