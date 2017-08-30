<?php
namespace App\Api\ErrorMessage;

use App\Api\ErrorMessage\Error;

class RoleErrorMessage extends Error
{
    //模型编码
    const MDOE_CODE = '1000';

    //错误列表
    const DELETE_ERROR_NOTFOUND = ['code' => self::MDOE_CODE . self::DELETE_CODE . self::NOT_FOUND, 'message' => '删除角色失败'];
    const UPDATE_ERROR_NOFOUND = ['code' => self::MDOE_CODE . self::UPDATE_CODE . self::NOT_FOUND, 'message' => '更新角色失败'];
    const INSERT_ERROR_SQL_SERVE = ['code' => self::MDOE_CODE . self::INSERT_CODE . self::SQL_SERVE_ERROR, 'message' => '添加角色失败'];
    
    //成功列表
    const SELECT_SUCCESS = "查询列表成功";
    const UPDATE_SUCCESS = "修改角色成功";
    const DELETE_SUCCESS = "删除角色成功";
    const INSERT_SUCCESS = "添加角色成功";
    
    //打印对象
    public function __toString()
    {
        return json_encode([
            'MODE_CODE' => self::MDOE_CODE,
            'DELETE_ERROR_NOTFOUND' => self::DELETE_ERROR_NOTFOUND,
            'UPDATE_ERROR_NOFOUND' => self::UPDATE_ERROR_NOFOUND,
            'INSERT_ERROR_SQL_SERVE' => self::INSERT_ERROR_SQL_SERVE,
            'SELECT_SUCCESS' => self::SELECT_SUCCESS,
            'UPDATE_SUCCESS' => self::UPDATE_SUCCESS,
            'DELETE_SUCCESS' => self::DELETE_SUCCESS,
            'INSERT_SUCCESS' => self::INSERT_SUCCESS,

        ]);
    }
}
