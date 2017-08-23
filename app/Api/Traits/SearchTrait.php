<?php

/**
 * @file:    SearchTrait.php
 * @author:  xiaojian
 * @date:    2017-08-01
 * @exp:     提供了模型搜索方法
 */

namespace App\Api\Traits;

trait SearchTrait
{
    //查询字段
    private $search_params = [];

    /**
     * @name   默认查询方法(分页)
     * @author xiaojian
     * @param  array[limit:此次查询获取的最大数据量，offset:此次查询的偏移数据量...]
     * @return array[total:符合条件的数据条数，rows:此次查询获取的数据列表]
     * @todo 指明应该改进或没有实现的地方
     */
    public function search($params)
    {
        $sql = $this;

        $result = ['total' => 0, 'rows' => []];

        foreach ($this->search_params as $key => $op) {
            if (isset($params[$key]) && !empty($params[$key])) {
                $sql = $sql->where($key, $op, $params[$key]);
            }
        }

        $result['total'] = $sql->count();

        if ($result['total'] > 0) {
            $result['rows'] = $sql->skip($params['offset'])->take($params['limit'])->get();
        }

        return $result;
    }

}
