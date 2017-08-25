<?php
namespace App\Api\ErrorMessage;

class Error
{
    const SELECT_CODE="1";//查询操作错误码
    const UPDATE_CODE="2";//更新操作错误码
    const DELETE_CODE="3";//删除操作错误码
    
    const NOT_FOUND="404";//操作对象不存在
    const DANGER_OP="500";//危险的操作
    const NO_ALLOW_OP="403";//不允许的操作
}
