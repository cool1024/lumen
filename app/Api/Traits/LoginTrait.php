<?php

/*
 * file:    LoginTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for user login token
 */

namespace App\Api\Traits;

use App\Api\Models\Login;
use App\Api\Models\User;
use App\Api\Traits\SecretTrait;

trait LoginTrait
{
    use SecretTrait;

    private $token_save_table = "LOGINS_TABLE";

    private function _updateToken($uid, $token_name = 'default')
    {
        $token = $this->getOneToken();
        $res = Login::updateOrCreate(['uid' => $uid, 'device' => $token_name], ['token' => $token]);
        return $res ? ['secret_id' => $this->encodeSecretId($uid), 'token' => $token] : 'update token error';
    }

    private function _checkToken($secret_id, $token)
    {
        $secret_id = $this->decodeSecretId($secret_id);
        if ($secret_id > 0) {
            $uid = Login::where(['uid' => $secret_id, 'token' => $token])->value('uid');
            return empty($uid) ? [] : User::find($uid);
        }
        else {
            return null;
        }
    }

    private function _cleanToken($secret_id, $token_name = 'default')
    {
        return Login::where(['uid' => $this->decodeSecretId($secret_id), 'device' => $token_name])->delete();
    }
}
