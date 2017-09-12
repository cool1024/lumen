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
    //判断用户是否具有指定权限
    public function hasPermission($key)
    {
        $id = Permission::where('key', $key)->value('id');
        if ($id > 0) {
            $permissions=$this->userAllPermission();
            return in_array($id, $permissions);
        }
        return false;
    }

    //获取用户全部权限
    public function userAllPermission()
    {
        $permissions = [];

        if (isset($this->useRoles) && $this->useRoles == true) {
            $roles = $this->roles();
            foreach ($roles as $role) {
                $permission = $role->permissions ? explode(',', $role->permissions) : [];
                $permissions = array_merge($permissions, $permission);
            }

        }
        if (isset($this->useGroups) && $this->useGroups == true) {
            $groups = $this->groups();
        }

        return array_unique($permissions);
    }
}
