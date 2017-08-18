<?php

namespace App\Api\Services;

use App\Api\Contracts\FileContract;
use App\Api\Traits\FileTrait;

class FileService implements FileContract
{
    use FileTrait;

    public function __construct()
    {
       
    }
}
