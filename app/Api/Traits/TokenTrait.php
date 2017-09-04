<?php

/*
 * file:    TokenTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for user token
 */

namespace App\Api\Traits;

use App\Api\Models\User;
use App\Api\Traits\SecretTrait;

trait TokenTrait
{
    use SecretTrait;

    private $token_save_table = "USER_TABLE";

    private function _updateToken($uid)
    {
        $token = $this->getOneToken();
        $res = User::where(['id' => $uid])->update(['remember_token' => $token]);
        return $res ? ['secret_id' => $this->encodeSecretId($uid), 'token' => $token] : 'update token error';
    }

    private function _checkToken($secret_id, $token)
    {
        $secret_id = $this->decodeSecretId($secret_id);
        if ($secret_id > 0) {
            return User::where(['id' => $secret_id, 'remember_token' => $token])->first();
        }
        else {
            return null;
        }
    }

    private function _cleanToken($uid)
    {
        return User::where(['id' => $uid])->update(['remember_token' => null]);
    }
}
