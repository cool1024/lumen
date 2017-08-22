<?php

/*
 * file:    RoleTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for role
 */

namespace App\Api\Traits;

use App\Api\Models\Role;

trait RoleTrait
{
    private $roleArray;

    private $useRoles=true;

    public function roles()
    {

        if (!isset($this->roleArray)) {
            return isset($this->user->roles)?$roles=Role::whereIn('id', explode(',', $this->user->roles))->get():[];
        } else {
            return $this->roleArray;
        }
    }

    public function role()
    {
        $roles=$this->roles();
        return !empty($roles)?$role[0]:null;
    }

}
