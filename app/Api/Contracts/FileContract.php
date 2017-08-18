<?php

namespace App\Api\Contracts;

interface FileContract
{    
    public function saveTo($name, $path);

    public function saveImageTo($name, $path);

    public function getFileNameByMd5($file);

    public function fileIsReady($name);
}
