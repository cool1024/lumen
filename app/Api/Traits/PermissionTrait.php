<?php

/*
 * file:    PermissionTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for permission
 */

namespace App\Api\Traits;

use App\Api\Models\Permission;

trait PermissionTrait
{
    public function hasPermission($key)
    {
        // $permission

        //使用了角色
        if (isset($this->useRoles) && $this->useRoles == true) {

        }

    }

    //获取用户全部权限
    public function userAllPermission()
    {
        $permissions = [];

        if (isset($this->useRoles) && $this->useRoles == true) {
            $roles = $this->roles;
        }
        if (isset($this->useGroups) && $this->useGroups == true) {
            $groups = $this->groups;
        }

        return $permissions;
    }
}
