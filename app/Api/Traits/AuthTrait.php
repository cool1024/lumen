<?php

/*
 * file:    AuthTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for auth
 */

namespace App\Api\Traits;

use App\Api\Models\User;

trait AuthTrait
{

    private $user;

    private $tokens = [];

    private function _signup($params)
    {

        $signParams = [];

        $primaryParams = [];

        $result = false;

        foreach (User::$signs['primary'] as $key) {
            $primaryParams[$key] = $params[$key];
            $signParams[$key] = $params[$key];
        }

        foreach (User::$signs['secondary'] as $key) {
            $signParams[$key] = $params[$key];
        }

        //验证方法存在问题（默认认为主要参数组合唯一，意味着存在组要参数组合不一样，但是单个参数一样），所有请确保主要参数有且只有一个
        if (empty(User::where($primaryParams)->first())) {
            $id = User::insertGetId($signParams);
            $result = $id > 0;
            if ($result) {
                $this->user = User::find($id);
            }
        }

        return $result;
    }

    private function _login($params)
    {
        $loginParams = [];

        foreach (User::$logins as $key) {
            $loginParams[$key] = $params[$key];
        }

        //密码字段只能有一个
        $secret = User::$signs['secret'][0];
        $password = $loginParams[$secret];
        unset($loginParams[$secret]);

        $user = User::where($loginParams)->select('id', "$secret as _$secret")->first();

        $result = !empty($user);

        if ($result) {
            $user = $user->toArray();
            if (self::checkPassword($password, $user["_$secret"])) {
                $this->user = User::find($user['id']);
            }
            else {
                $result = false;
            }
        }
        else {
            $result = false;
        }

        return $result;
    }

    private function _info()
    {
        return $this->user;
    }

}
