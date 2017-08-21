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
        $res = User::updateOrCreate(['id' => $uid], ['remember_token' => $token]);
        return $res ? $token : 'update token error';
    }

    private function _getUidByToken($secret_id, $token)
    {
        return User::where(['id' => $this->getLoginId($secret_id), 'remember_token' => $token])
            ->whereNotNull('remember_token')
            ->value('id');
    }

    private function _cleanToken($uid)
    {
        return User::where(['id' => $this->getLoginId($secret_id)])->update(['remember_token' => null]);
    }

}
