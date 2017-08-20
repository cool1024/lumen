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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->post('/valid/test', function (ApiContract $api) {
    return $api->getParams(['email:email','password:min:8|max:12']);
});

$app->post('/upload/image', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveImageTo('image', 'upload'));
});

$app->post('/upload/file', function (ApiContract $api, FileContract $file) {
    return $api->datas($file->saveTo('file', 'upload'));
});

$app->post('/login', function (ApiContract $api, AuthContract $auth) {
    $params=$api->getParams(['email:email','password:min:8|max:12']);
    if ($params['result']) {
        if ($auth->login($params['datas'])) {
            return $api->datas($auth->updateToken());
        } else {
            return $api->error("email or password wrong");
        }
    } else {
        return $params;
    }
});

$app->post('/signup', function (ApiContract $api, AuthContract $auth) {
    $params=$api->getParams(['email:email','name:min:4|max:16','password:min:6|max:12']);
    if ($params['result']) {
        $result=$auth->signup($params['datas']);
        return $result?$api->success('sign up success'):$api->error('account is exist');
    } else {
        return $params;
    }
});

$app->post('/check', function (ApiContract $api, AuthContract $auth) {
    $params=$api->getParams(['secret','token']);
    if ($params['result']) {
        $result=$auth->check($params['datas']['secret'],$params['datas']['token']);
        return $result?$api->success('check success'):$api->error('check false');
    } else {
        return $params;
    }
});
