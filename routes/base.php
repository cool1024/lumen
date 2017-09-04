<?php

//基础功能模块（任何用户登入后都可以使用的功能）

use App\Api\Contracts\ApiContract;
use App\Api\Contracts\AuthContract;

//用户退出登入（API默认用户登出接口）
$app->get('/signout', function (ApiContract $api, AuthContract $auth) {
    $auth->signout();
    return $api->success('登出成功~');
});

//获取当前登入用户信息（API默认用户信息获取接口）
$app->get('/info', function (AuthContract $auth) {
    return $auth->info();
});

//获取用户权限列表(仅供API测试使用)
$app->get('/permission', function (AuthContract $auth) {
    return $auth->info()->userAllPermission();
});

//判断用户是否具有某个权限(仅供API测试使用)
$app->get('/has/permission', function (AuthContract $auth, ApiContract $api) {
    $param = $api->getParam('key');
    if ($param['result']) {
        return $auth->hasPermission($param['datas']['key']);
    }
    else {
        return $param;
    }
});
