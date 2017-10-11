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
use Illuminate\Http\Request;

//参数校验（只能用于API测试，禁止用于生产环境）
$app->post('/valid/test', function (ApiContract $api) {
    return $api->getParams(['email:email', 'password:min:8|max:12']);
});

//图片上传（只能用于API测试，禁止用于生产环境）
$app->post('/upload/image', function (ApiContract $api, FileContract $file) {
    //return $api->datas($file->saveImageTo('image', 'upload'));
    return $api->datas($file->saveImageByMd5('image', 'upload'));
});

//文件上传（只能用于API测试，禁止用于生产环境）
$app->post('/upload/file', function (ApiContract $api, FileContract $file) {
    //return $api->datas($file->saveFileTo('file', 'upload'));
    return $api->datas($file->saveFileByMd5('file', 'upload'));
});

//删除指定路径的文件（只能用于API测试，禁止用于生产环境）
$app->delete('/upload/remove', function (ApiContract $api, FileContract $file) {
    $param = $api->getParam('path');
    if ($param['result']) {
        return $api->delete_message($file->removeFile($param['datas']['path']));
    }
    else {
        return $param;
    }
});

//富文本编辑器图片上传
$app->post('/upload/editor', function (ApiContract $api, FileContract $file) {
    return ['link' => "http://" . $_SERVER['SERVER_ADDR'] . "/" . $file->saveImageTo('file', 'upload')];
});