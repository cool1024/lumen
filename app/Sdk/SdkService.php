<?php
namespace App\Sdk;

require_once __DIR__ . '/union-pay/service.php';

use App\Sdk\SdkContract;

class SdkService implements SdkContract
{

    private $sdks = [];

    public function __construct()
    {
        //载入所有skd服务
        $this->sdks['unionpay'] = new \com\unionpay\acp\sdk\UnionPayService();
    }

    public function get($sdk_name)
    {
        return $this->sdks[$sdk_name];
    }
}
