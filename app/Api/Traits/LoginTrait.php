<?php

/*
 * file:    LoginTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for user login token
 */

namespace App\Api\Traits;

use App\Api\Models\Login;
use App\Api\Traits\SecretTrait;

trait LoginTrait
{
    use SecretTrait;

    private $token_save_table="LOGINS_TABLE";

    private function _updateToken($uid, $token_name = 'default')
    {
        $token=$this->getOneToken();
        $res=Login::updateOrCreate(['uid'=>$uid,'device'=>$token_name], ['token'=>$token]);
        return $res?$token:'update token error';
    }

    private function _getUidByToken($secret_id, $token, $token_name = 'default')
    {
        return Login::where(['id'=>$this->getLoginId($secret_id),'token'=>$token,'device'=>$token_name])->value('uid');
    }

    private function _cleanToken($uid, $token_name = 'default')
    {
        return Login::where(['uid'=>$this->getLoginId($secret_id),'device'=>$token_name])->delete();
    }

}
