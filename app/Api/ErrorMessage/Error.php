<?php
namespace App\Api\ErrorMessage;

class Error
{
    const SELECT_CODE="1";//查询操作错误码
    const UPDATE_CODE="2";//更新操作错误码
    const DELETE_CODE="3";//删除操作错误码
    const INSERT_CODE="4";//INSERT OP CODE
    
    const NOT_FOUND="400";//操作对象不存在
    const DANGER_OP="500";//危险的操作
    const NO_ALLOW_OP="600";//不允许的操作
    const SQL_SERVE_ERROR="700";//SQL SERVER ERROR
    const ERROR_PARAMS="700";//PARAMS ERROR
}
