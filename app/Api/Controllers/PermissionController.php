<?php

/**
 * @author xiaojian
 * @file PermissionController.php
 * @info 权限菜单控制器
 * @date 2017年8月23日
 */

namespace App\Api\Controllers;

use Laravel\Lumen\Routing\Controller;
use App\Api\Contracts\ApiContract;
use App\Api\Models\PermissionModel;
use App\Api\Models\Permission;

class PermissionController extends Controller
{

    private $api;

    private $model;

    private $permission;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ApiContract $api)
    {
        $this->api = $api;
        $this->model = new PermissionModel();
        $this->permission = new Permission();
    }

    /**
     * @name   获取系统所有权限模块与权限（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function getAllPermissionAndModel()
    {
        //获取所有权限模块
        $models = $this->model->all()->toArray();

        //获取所有权限
        $permissions = $this->permission->all()->toArray();

        return $this->api->datas(['models' => $models, 'permissions' => $permissions], '获取数据成功');
    }

    /**
     * @name   在指定模块下添加权限（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function addPermission()
    {
        //必须参数[name:权限名称，modelid:模块id,key:权限关键词],可选参数[description:权限描述]
        $params = $this->api->getParams(['name:string', 'modelid:integer', 'key:string'], ['description:string|max:100']);

        if ($params['result']) {

            $id = $this->permission->insertGetId($params['datas']);

            return $this->api->insert_message($id);
        }
        else {
            return $params;
        }
    }

    /**
     * @name   删除指定id的权限（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function deletePermission()
    {
         //必须参数[id:权限ID]
        $param = $this->api->getParams(['permissionid:integer']);

        if ($param['result']) {

            $result = $this->permission->destroy($param['datas']['permissionid']);

            return $this->api->delete_message($result);
        }
        else {
            return $param;
        }
    }

    /**
     * @name   修改指定权限（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function changePermission()
    {
         //必须参数[id:权限ID,name:权限名称，key:权限关键词],可选参数[description:权限描述]
        $params = $this->api->getParams(['id:integer', 'name:string', 'key:string'], ['description:string|max:100']);

        if ($params['result']) {

            $permission = $this->permission->find($params['datas']['id']);
            if (empty($permission)) {
                return $this->api->error('permission not found');
            }
            else {
                $permission->name = $params['datas']['name'];
                $permission->key = $params['datas']['key'];
                if (isset($params['datas']['description'])) $permission->description = $params['datas']['description'];
                $permission->save();
                return $this->api->success('permission update success');
            }
            $id = $this->permission->update($params['datas']);

            return $this->api->insert_message($id);
        }
        else {
            return $params;
        }
    }

    /**
     * @name   修改指定权限模块（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function changePermissionModel()
    {
        //必须参数[id:权限模块ID,name:权限模块名称]
        $params = $this->api->getParams(['id:integer', 'name:string']);

        if ($params['result']) {

            $model = $this->model->find($params['datas']['id']);

            if (empty($model)) {
                return $this->api->error('model not found');
            }
            else {
                $model->name = $params['datas']['name'];
                $model->save();
                return $this->api->success('model update success');
            }
        }
        else {
            return $params;
        }
    }

    /**
     * @name   添加权限模块（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function addPermissionModel()
    {
        //必须参数[name:权限模块名称]
        $params = $this->api->getParams(['name:string|max:45']);

        if ($params['result']) {
            $id = $this->model->insertGetId($params['datas']);
            return $this->api->insert_message($id);
        }
        else {
            return $params;
        }
    }

    /**
     * @name   删除指定id的权限模块（用于权限设置模块）
     * @author xiaojian
     * @return array[result:请求结果，message:操作信息,datas:数据结果]
     */
    function deletePermissionModel()
    {
        //必须参数[id:权限ID]
        $param = $this->api->getParams(['modelid:integer']);

        if ($param['result']) {

            //删除模块下的子权限
            $this->permission->where('modelid', $param['datas']['modelid']);

            //删除权限模块
            $result = $this->model->destroy($param['datas']['modelid']);

            return $this->api->delete_message($result);
        }
        else {
            return $param;
        }
    }

}
