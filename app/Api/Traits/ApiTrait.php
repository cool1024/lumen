<?php

/*
 * file:    ApiTrait.php
 * author:  xiaojian
 * date:    2017-08-01
 * exp:     some useful function for api request
 */

namespace App\Api\Traits;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;

trait ApiTrait
{

    public function getParam($param)
    {
        $validator_target = [];
        $validator_values = [];
        $result = ['result' => false, 'message' => [], 'datas' => []];
        $index = strpos($param, ':');
        if (!empty($index)) {
            $param_name = substr($param, 0, $index);
            $param_avlid = substr($param, $index + 1);
            $validator_target[$param_name] = "required|$param_avlid";
            $validator_values[$param_name] = Request::input($param_name);
        }
        else {
            $validator_target[$param] = "required";
            $validator_values[$param] = Request::input($param);
        }

        $validator = Validator::make(Request::all(), $validator_target);

        if (!$validator->fails()) {
            $result['datas'] = $validator_values;
            $result['result'] = true;
        }
        else {
            $result['message'] = $validator->messages();
        }
        return $result;
    }

    public function getParams($params = [], $exp = [], $formate = [], $message = [])
    {
        $validator_target = [];
        $validator_values = [];
        $result = ['result' => false, 'message' => [], 'datas' => []];
        foreach ($params as $value) {
            $index = strpos($value, ':');
            if (!empty($index)) {
                $param_name = substr($value, 0, $index);
                $param_avlid = substr($value, $index + 1);
                $validator_target[$param_name] = "required|$param_avlid";
                $validator_values[$param_name] = Request::input($param_name);
            }
            else {
                $validator_target[$value] = "required";
                $validator_values[$value] = Request::input($value);
            }
        }
        foreach ($exp as $value) {
            $index = strpos($value, ':');
            if (!empty($index)) {
                $param_name = substr($value, 0, $index);
                $param_avlid = substr($value, $index + 1);
                if (Request::has($param_name)) {
                    $validator_target[$param_name] = $param_avlid;
                    $validator_values[$param_name] = Request::input($param_name);
                }
            }
            else {
                if (Request::has($value)) {
                    $validator_values[$value] = Request::input($value);
                }
            }
        }

        $validator = Validator::make(Request::all(), $validator_target, $message);
        
        if (!$validator->fails()) {
            foreach ($formate as $key => $value) {
                if (isset($validator_values[$key]) && !isset($validator_values[$value])) {
                    $validator_values[$value] = $validator_values[$key];
                    unset($validator_values[$key]);
                }
            }
            $result['datas'] = $validator_values;
            $result['result'] = true;
        }
        else {
            $result['message'] = $validator->messages();
        }

        return $result;
    }

    //return a success message
    public function success($message = "success")
    {
        return ['result' => true, 'message' => $message];
    }

    //return a error message
    public function error($message = "error")
    {
        return gettype($message) == 'string' ? ['result' => false, 'message' => $message] : ['result' => false, 'code' => $message['code'], 'message' => $message['message']];
    }

    //return paginate datas
    public function paginate($paginate, $message = "paginate")
    {
        return ['result' => true, 'message' => $message, 'datas' => ['total' => $paginate['total'], 'rows' => $paginate['rows']]];
    }

    //reutrn some datas and can be empty
    public function datas($datas, $message = "get datas success")
    {
        return ['result' => true, 'message' => $message, 'datas' => $datas];
    }

    //return one data and can not be empty
    public function data($datas, $success = "get datas success", $error = "get datas failed")
    {
        return empty($datas) ? self::error($error) : ['result' => true, 'message' => $success, 'datas' => $datas];
    }

    //return insert message
    public function insert_message($insert_id, $success = "insert success", $error = "insert error")
    {
        return empty($insert_id) ? self::error($error) : ['result' => true, 'message' => $success, 'id' => $insert_id];
    }

    //return delete message
    public function delete_message($delete_result, $success = "delete success", $error = "delete error")
    {
        return empty($delete_result) ? self::error($error) : self::success($success);
    }

    //return update message
    public function update_message($update_result, $success = "update success", $error = "update error")
    {
        return empty($update_result) ? self::error($error) : self::success($success);
    }

}
