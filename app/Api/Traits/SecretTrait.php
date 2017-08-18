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

    private function secretLoginId($login_id)
    {
        return base64_encode($login_id);
    }

    private function getLoginId($secret)
    {
        return json_decode($secret);
    }
}
