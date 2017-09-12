<?php

/*
 * file:    SecretTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for secret
 */

namespace App\Api\Traits;

trait SecretTrait
{

    private function getOneToken()
    {
        return sha1(uniqid(true,true));
    }

    private function encodeSecretId($login_id)
    {
        return base64_encode($login_id);
    }

    private function decodeSecretId($secret)
    {
        $id = base64_decode($secret);
        return (bool)preg_match('/^[1-9][0-9]*$/', $id) ? $id : 0;
    }

}
