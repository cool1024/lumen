<?php

namespace App\Api\Services;

use App\Api\Contracts\AuthContract;
use App\Api\Traits\AuthTrait;
use App\Api\Traits\LoginTrait;
use App\Api\Traits\TokenTrait;


class AuthService implements AuthContract
{
    use AuthTrait,LoginTrait;//TokenTrait;

    private $isLogin;

    public function __construct()
    {
    }

    public function signout()
    {
        dd($this->user);
        $this->cleanToken($this->user->id);
    }

    public function signup($params)
    {
        return $this->_signup($params);
    }

    public function login($params)
    {
        return $this->_login($params);
    }

    public function info()
    {
        return $this->_info();
    }

    public function status()
    {
        if (isset($this->user)) {
            if (isset($this->isLogin)&&$this->isLogin==true) {
                return 'login in';
            } else {
                return 'login false';
            }
        } else {
            return 'login fail';
        }
    }

    public function updateToken($token_name = 'default')
    {
        if ($this->token_save_table=='USER_TABLE') {
            return $this->_updateToken($this->user->id);
        } elseif ($this->token_save_table=='LOGINS_TABLE') {
            return $this->_updateToken($this->user->id, $token_name);
        }
    }

    public function cleanToken($token_name = 'default')
    {
        if ($this->token_save_table=='USER_TABLE') {
            $this->_cleanToken($this->user->id);
        } elseif ($this->token_save_table=='LOGINS_TABLE') {
            $this->_cleanToken($this->user->id, $token_name);
        }
    }

    public function check($secret_id,$token){
        $this->user=$this->_checkToken($secret_id,$token);
        return !empty($this->user);
    }
}
