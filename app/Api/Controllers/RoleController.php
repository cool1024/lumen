<?php

/** 
 * @author xiaojian
 * @file RoleController.php
 * @info 系统角色控制器
 * @date 2017年8月23日 
 */

namespace App\Api\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Api\Contracts\ApiContract;
use App\Api\Models\Role;

class RoleController extends Controller
{
    private $api;

    private $role;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ApiContract $api)
    {
        $this->api = $api;
        $this->role = new Role();
    }


    //获取系统角色列表（分页）
    function getRoles()
    {

        $params = $this->api->getParams(['limit:integer', 'offset:integer']);

        if ($params['result']) {

            return $this->api->datas($this->role->search($params['datas']));
        }
        else {
            return $params;
        }

    }
}
