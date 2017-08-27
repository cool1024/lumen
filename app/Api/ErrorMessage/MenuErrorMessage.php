<?php
namespace App\Api\ErrorMessage;

use App\Api\ErrorMessage\Error;

class MenuErrorMessage extends Error
{
    //模型编码
    const MDOE_CODE = '2000';

    //错误列表
    const DELETE_ERROR_NOTFOUND = ['code' => self::MDOE_CODE . self::DELETE_CODE . self::NOT_FOUND, 'message' => 'delete error'];
    const UPDATE_ERROR_NOFOUND = ['code' => self::MDOE_CODE . self::DELETE_CODE . self::NOT_FOUND, 'message' => 'update error'];
    const INSERT_ERROR_SQL_SERVE_ERROR=['code' => self::MDOE_CODE . self::INSERT_CODE . self::SQL_SERVE_ERROR, 'message' => 'insert error'];
    const SORT_ERROR_PARAMS=['code' => self::MDOE_CODE . self::DELETE_CODE . self::NOT_FOUND, 'message' => 'sort error'];

    //成功列表
    const SELECT_SUCCESS="menu get success";
    const UPDATE_SUCCESS="menu update success";
    const DELETE_SUCCESS="menu delete success";
    const INSERT_SUCCESS="menu insert success";
    const SORT_SUCCESS="menu sort success";

    //打印对象
    public function __toString(){
        return json_encode([
            'MODE_CODE'=>self::MDOE_CODE,
            'DELETE_ERROR_NOTFOUND'=>self::DELETE_ERROR_NOTFOUND,
            'UPDATE_ERROR_NOFOUND'=>self::UPDATE_ERROR_NOFOUND,
            'INSERT_ERROR_SQL_SERVE_ERROR'=>self::INSERT_ERROR_SQL_SERVE_ERROR,
            'SORT_ERROR_PARAMS'=>self::SORT_ERROR_PARAMS,
            'SELECT_SUCCESS'=>self::SELECT_SUCCESS,
            'UPDATE_SUCCESS'=>self::UPDATE_SUCCESS,
            'DELETE_SUCCESS'=>self::DELETE_SUCCESS,
            'INSERT_SUCCESS'=>self::INSERT_SUCCESS,
            'SORT_SUCCESS'=>self::SORT_SUCCESS,            
        ]);
    }
}
