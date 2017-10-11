<?php
use App\Api\Contracts\ApiContract;
use App\Api\Contracts\AuthContract;

//首页
$app->get('/', function () use ($app) {
    return redirect('api-docs');
    //return $app->version();

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