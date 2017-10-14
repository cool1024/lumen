<?php

/**
 * @file:    SearchTrait.php
 * @author:  xiaojian
 * @date:    2017-08-01
 * @exp:     提供了模型搜索方法
 */

namespace App\Api\Traits\Orm;

trait SearchTrait
{
    //查询字段配置(示例)
    // private $search_params = [
    //    "goods_id"=>['where','='],    //goods_id商品id等于某个值
    //    "price"=>['where','>'],       //price价格大于某个值
    //    "name"=>['where','like'],     //name名称类似某个值
    //    "type"=>['whereIn']           //type类型属于某个区间
    // ];

    //后续操作配置
    //private $search_operations = [
    //   'created_at'=>['orderBy','desc'],//按created_at创建时间排序
    //]

    /**
     * @name   默认查询方法(分页)
     * @author xiaojian
     * @param  array[limit:此次查询获取的最大数据量，offset:此次查询的偏移数据量...],array[...查询字段，这是可选参数，如果有的话，会覆盖模型内的设置参数],array[...操作字段，这是可选参数，如果有会覆盖模型内置参数]
     * @return array[total:符合条件的数据条数，rows:此次查询获取的数据列表]
     * @todo   特殊查询需要定制
     */
    public function search($params,$search_params=null,$search_operations=null)
    {

        if($search_params===null){

            $search_params = isset($this->search_params)?$this->search_params:[];

        }

        if($search_operations===null){

            $search_operations=isset($this->search_operations)?$this->search_operations:[];

        }

        $sql = $this;

        $result = ['total' => 0, 'rows' => []];

        foreach ( as $key => $judgment) {

            if (isset($params[$key]) && !empty($params[$key])) {

                $sql = count($judgment)===1?$sql->$judgment[0]($key, $params[$key]):$sql->$judgment[0]($key, $judgment[1], $params[$key]);
            }
        }

        $result['total'] = $sql->count();

        if ($result['total'] > 0) {

            foreach ($this->search_operations as $key => $rule) {

                $sql = count($rule)===1?$sql->$rule[0]($key, $params[$key]):$sql->$rule[0]($key, $rule[1], $params[$key]);

            }

            $result['rows'] = $sql->skip($params['offset'])->take($params['limit'])->get();
        }

        return $result;
    }

}
