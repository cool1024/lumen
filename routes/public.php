<?php
use App\Api\Contracts\FileContract;
use App\Api\Contracts\ApiContract;
use App\Api\Contracts\AuthContract;
use App\Sdk\SdkContract;

//首页
$app->get('/', function () use ($app) {
    return $app->version();
});

//登入模块（API默认登入接口）
$app->post('/login', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['email:email', 'password:min:8|max:12']);
    if ($params['result']) {
        if ($auth->login($params['datas'])) {
            return $api->datas($auth->updateToken());
        }
        else {
            return $api->error("账户或密码错误");
        }
    }
    else {
        return $params;
    }
});

//校验令牌有效性（API默认校验接口）
$app->post('/check', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['ng-params-one', 'ng-params-two'], [], ['ng-params-one' => 'secret', 'ng-params-two' => 'token']);
    if ($params['result']) {
        $result = $auth->check($params['datas']['secret'], $params['datas']['token']);
        if ($result) {
            $info = $auth->info();
            $role = $info->role();
            if (isset($role) && !empty($role)) {
                $info->role = $role->name;
            }
            return $api->datas($info);
        }
        else {
            return $api->error('登入令牌校错误，请重新登入');
        }
    }
    else {
        return $params;
    }
});

//参数校验（只能用于API测试，禁止用于生产环境）
$app->post('/valid/test', function (ApiContract $api) {
    return $api->getParams(['email:email', 'password:min:8|max:12']);
});

//图片上传（只能用于API测试，禁止用于生产环境）
$app->post('/upload/image', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveImageTo('image', 'upload'));
});

//文件上传（只能用于API测试，禁止用于生产环境）
$app->post('/upload/file', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveTo('file', 'upload'));
});

//注册模块（只能用于API测试，禁止用于生产环境）
$app->post('/signup', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['email:email', 'name:min:4|max:16', 'password:min:8|max:12']);
    if ($params['result']) {
        $result = $auth->signup($params['datas']);
        return $result ? $api->success('注册成功~') : $api->error('用户已经被注册~');
    }
    else {
        return $params;
    }
});

//e支付测试
$app->get('/test/pay', function (SdkContract $sdk) {
    $epay = $sdk->get('epay');

    $order = [
        'ordersn' => date('YmdHis'),//唯一订单号
        'amount' => 1000,//订单价格（分）
        'merID' => '1503EE20175021',//商户ID
        'merAcct' => '1503214909000050467',//商户收账银行卡号
        'merURL' => 'http:://www.baidu.com',//异步通知地址
        'goodsID' => 'No.450',//商品编号
        'goodsName' => '测试商品',//商品名称
        'goodsNum' => '1',//商品数量
        'merHint' => 'NULL',//商城提示信息
    ];
    return $epay->getPayOrder($order);//getHtmlPayOrder($order);
});

//e支付异步通知测试
$app->post('/test/notify', function () {
    return response(500,phpinfo());
    //$epay = $sdk->get('epay');
    //dd($epay->checkNotifyMessage());
    //验证成功返回同步跳转地址
    return "http://www.baidu.com";
});