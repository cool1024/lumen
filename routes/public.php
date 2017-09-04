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
            return $api->error("email or password wrong");
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
        return $result ? $api->success('check success') : $api->error('check false');
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