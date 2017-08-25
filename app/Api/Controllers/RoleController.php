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
use App\Api\ErrorMessage\RoleErrorMessage as Error;

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

        //limit:限制数据条数，offset:查询游标
        $params = $this->api->getParams(['limit:integer', 'offset:integer']);

        if ($params['result']) {

            return $this->api->datas($this->role->search($params['datas']));
        }
        else {
            return $params;
        }

    }

    /**
     * @name   删除指定角色（角色被删除后，使用此角色的组将剔除此角色，此角色的下级角色将没有上级角色）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息]
     * @todo   角色被删除后，使用此角色的组将剔除此角色，此角色的下级角色将没有上级角色
     */
    function deleteRole()
    {

        //id:删除的角色id
        $param = $this->api->getParam('roleid:integer');

        if ($param['result']) {

            return $this->api->delete_message($this->role->destroy($param['datas']['roleid']), Error::DELETE_SUCCESS, Error::DELETE_ERROR_NOTFOUND);
        }
        else {
            return $param;
        }
    }

}
