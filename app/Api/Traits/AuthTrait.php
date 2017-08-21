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

    private $tokens=[];

    private function _signup($params)
    {
        
        $signParams=[];

        $primaryParams=[];

        $result=false; 
        
        foreach (User::$signs['primary'] as $key) {
            $primaryParams[$key]=$params[$key];
            $signParams[$key]=$params[$key];
        }

        foreach (User::$signs['secondary'] as $key) {
            $signParams[$key]=$params[$key];
        }

        if (empty(User::where($primaryParams)->first())) {
            $result=User::insertGetId($signParams)>0;
            if(!empty($result)){
                $this->user=User::find($result);
            }
        }

        return $result;
    }

    private function _login($params)
    {
        $loginParams=[];

        foreach (User::$logins as $key) {
            $loginParams[$key]=$params[$key];
        }

        $user=User::where($loginParams)->first();

        $result=!empty($user);

        if ($result) {
            $this->user=$user;
        }

        return $result;
    }

    private function _info()
    {
        return $this->user;
    }

}
