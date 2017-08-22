<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */
use App\Api\Contracts\FileContract;
use App\Api\Contracts\ApiContract;
use App\Api\Contracts\AuthContract;
use App\Sdk\SdkContract;

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/valid/test', function (ApiContract $api) {
    return $api->getParams(['email:email', 'password:min:8|max:12']);
});

$app->post('/upload/image', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveImageTo('image', 'upload'));
});

$app->post('/upload/file', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveTo('file', 'upload'));
});

$app->post('/login', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['email:email', 'password:min:8|max:12']);
    if ($params['result']) {
        if ($auth->login($params['datas'])) {
            return $api->datas($auth->updateToken());
        }
        else {
            return $api->error("email or password wrong");
        }
    }
    else {
        return $params;
    }
});

$app->post('/signup', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['email:email', 'name:min:4|max:16', 'password:min:6|max:12']);
    if ($params['result']) {
        $result = $auth->signup($params['datas']);
        return $result ? $api->success('注册成功~') : $api->error('用户已经被注册~');
    }
    else {
        return $params;
    }
});

$app->get('/signout', function (AuthContract $auth) {
    //$result=$auth->signout();
    //return $result?$api->success('注册成功~'):$api->error('用户已经被注册~');
});

$app->post('/check', function (ApiContract $api, AuthContract $auth) {
    $params = $api->getParams(['secret', 'token']);
    if ($params['result']) {
        $result = $auth->check($params['datas']['secret'], $params['datas']['token']);
        return $result ? $api->success('check success') : $api->error('check false');
    }
    else {
        return $params;
    }
});

$app->post('/unionpay', function (SdkContract $sdk) {
    //[app_id:商户号,price:交易金额（分）,order_sn:订单编号,created_at:订单创建时间，lasted_at:订单超时时间]
    return $sdk->get('unionpay')->getHtmlPayOrder([
        'app_id' => '777290058110048',
        'price' => 1000,
        'order_sn' => date('YmdHis'),
        'created_at' => date('YmdHis'),
        'lasted_at' => date('YmdHis', strtotime('+1 day'))
    ]);
});

$app->post('/unionpay/confirm', function (ApiContract $api, SdkContract $sdk) {
    //[app_id:商户号,order_sn:订单编号,created_at:订单创建时间]
    $params = $api->getParams(['order_sn', 'created_at']);
    if ($params['result']) {
        return $sdk->get('unionpay')->getOrderStaus([
            'app_id' => '777290058110048',
            'order_sn' =>$params['datas']['order_sn'],
            'created_at' =>$params['datas']['created_at'],
        ]);
    }
    else {
        return $params;
    }
});