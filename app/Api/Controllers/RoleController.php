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
use App\Api\ErrorMessage\RoleErrorMessage as RetrunMessage;

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

            $this->role->where('parentid', $param['datas']['roleid'])->update(['parentid' => 0]);
            return $this->api->delete_message($this->role->destroy($param['datas']['roleid']), RetrunMessage::DELETE_SUCCESS, RetrunMessage::DELETE_ERROR_NOTFOUND);
        }
        else {
            return $param;
        }
    }

    /**
     * @name   修改角色
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息]
     */
    function changeRole()
    {
 
        //必须参数[id:角色ID,name:角色名称，parentid:上级角色ID，description:角色描述],可选参数[permissions:权限id串（1,2,3,4...）]
        $params = $this->api->getParams(['id:integer', 'name', 'parentid:integer', 'description:string|max:100'], ['permissions:string']);

        if ($params['result']) {

            $role = $this->role->find($params['datas']['id']);

            if (empty($role)) {
                return $this->api->error(RetrunMessage::UPDATE_ERROR_NOFOUND);
            }
            else {
                $role->name = $params['datas']['name'];
                $role->parentid = $params['datas']['parentid'];
                $role->description = $params['datas']['description'];
                $role->permissions = isset($params['datas']['permissions']) ? $params['datas']['permissions'] : '';
            }

            $role->save();

            return $this->api->success(RetrunMessage::UPDATE_SUCCESS);
        }
        else {
            return $param;
        }
    }

    /**
     * @name   添加角色
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息]
     */
    function addRole()
    {
  
        //必须参数[name:角色名称，parentid:上级角色ID，description:角色描述],可选参数[permissions:权限id串（1,2,3,4...）]
        $params = $this->api->getParams(['name', 'parentid:integer', 'description:string|max:100'], ['permissions:string']);

        if ($params['result']) {

            $id = $this->role->insertGetId($params['datas']);

            return $this->api->insert_message($id, RetrunMessage::INSERT_SUCCESS, RetrunMessage::INSERT_ERROR_SQL_SERVE);
        }
        else {
            return $param;
        }
    }

}