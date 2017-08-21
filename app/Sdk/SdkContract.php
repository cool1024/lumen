<?php

namespace App\Sdk;

interface SdkContract
{
    //获取指定名称的服务
    public function get($sdk_name);
}
