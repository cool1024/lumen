<?php

/*
 * file:    SecretTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for user token
 */

namespace App\Api\Traits;

trait SecretTrait
{

    private function getOneToken()
    {
        return md5(uniqid());
    }

    private function encodeSecretId($login_id)
    {
        return base64_encode($login_id);
    }

    private function decodeSecretId($secret)
    {
        $id=base64_decode($secret);
        $id=1;
        dd(is_int($id));
        return is_int($id)?$id:0;
    }
}
