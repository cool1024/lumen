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

//富文本文件上传
$app->post('/upload/editor', function (ApiContract $api, FileContract $file) {
    return ['link' => "http://" . $_SERVER['SERVER_ADDR'] . "/" . $file->saveImageTo('file', 'upload')];
});

//e支付测试
$app->get('/test/pay', function (SdkContract $sdk) {

    $epay = $sdk->get('epay');

    $order = [
        'ordersn' => date('YmdHis'),//唯一订单号
        'amount' => 1000,//订单价格（分）
        'merID' => '1503EE20175021',//商户ID
        'merAcct' => '1503214909000050467',//商户收账银行卡号
        'merURL' => 'http://www.baidu.com',//异步通知地址
        'goodsID' => 'No.450',//商品编号
        'goodsName' => '测试商品',//商品名称
        'goodsNum' => '1',//商品数量
        'merHint' => 'NULL',//商城提示信息
    ];
    return $epay->getHtmlPayOrder($order);//getHtmlPayOrder($order);


});

//e支付异步通知测试
$app->post('/test/notify', function (Request $request) {
    file_put_contents("/var/www/lumen/public/log.txt", json_encode($request->all()), FILE_APPEND);
    return "http://ng.cool1024.com/ng/home";
    // $epay = $sdk->get('epay');
    // $result=$epay->checkNotifyMessage();
    // return response($result,200);
    // //验证成功返回同步跳转地址
    // return "http://www.baidu.com";


});