<?php

namespace App\Api\Contracts;

interface AuthContract
{

    public function signup($params);
 
    public function login($params);

    public function signout();

    public function updateToken($token_name='default');

    public function cleanToken($token_name='default');
}
