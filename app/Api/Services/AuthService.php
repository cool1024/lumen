<?php
namespace App\Api\Services;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Crypt;
use App\Api\Contracts\AuthContract;
use App\Api\Models\User;
use App\Api\Traits\AuthTrait;
use App\Api\Traits\LoginTrait;
use App\Api\Traits\TokenTrait;

class AuthService extends Facade implements AuthContract
{
    use AuthTrait, TokenTrait; //LoginTrait;

    private $isLogin;

    public function __construct()
    {

    }

    protected static function getFacadeAccessor()
    {
        return 'auth';
    }

    public function signout()
    {
        $this->cleanToken($this->user->id);
    }

    public function signup($params)
    {
        $secrets = User::$signs['secret'];
        foreach ($secrets as $value) {
            $params[$value] = Crypt::encrypt($params[$value]);
        }
        return $this->_signup($params);
    }

    public function login($params)
    {
        return $this->_login($params);
    }

    public function secretPassword($password)
    {
        return Crypt::encrypt($password);
    }

    public function checkPassword($password, $secret)
    {
        return Crypt::decrypt($secret) === $password;
    }

    public function info()
    {
        return $this->_info();
    }

    public function status()
    {
        if (isset($this->user)) {
            if (isset($this->isLogin) && $this->isLogin == true) {
                return 'login in';
            }
            else {
                return 'login false';
            }
        }
        else {
            return 'login fail';
        }
    }

    public function updateToken($token_name = 'default')
    {
        if ($this->token_save_table == 'USER_TABLE') {
            return $this->_updateToken($this->user->id);
        }
        elseif ($this->token_save_table == 'LOGINS_TABLE') {
            return $this->_updateToken($this->user->id, $token_name);
        }
    }

    public function cleanToken($token_name = 'default')
    {
        if ($this->token_save_table == 'USER_TABLE') {
            $this->_cleanToken($this->user->id);
        }
        elseif ($this->token_save_table == 'LOGINS_TABLE') {
            $this->_cleanToken($this->user->id, $token_name);
        }
    }

    public function check($secret_id, $token)
    {
        $this->user = $this->_checkToken($secret_id, $token);
        return !empty($this->user);
    }

    public function hasPermission($key)
    {
        dd($this->user->hasPermission($key));
        dd($this->user->role());
    }
}
