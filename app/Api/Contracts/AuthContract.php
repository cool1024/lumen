<?php
namespace App\Api\Contracts;

interface AuthContract
{

    //注册账户
    public function signup($params);
 
    //账户登入
    public function login($params);

    //登入令牌校验
    public function check($secret_id, $token);

    //退出登入
    public function signout();

    //更新令牌
    public function updateToken($token_name = 'default');

    //清空令牌
    public function cleanToken($token_name = 'default');

    //加密密码
    public function secretPassword($password);
}
