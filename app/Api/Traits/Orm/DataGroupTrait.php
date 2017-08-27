<?php

/**
 * @file:    DataGroupTrait.php
 * @author:  xiaojian
 * @date:    2017-08-01
 * @exp:     提供了数据分组查询方法（只适用于少量数据）
 */

namespace App\Api\Traits\Orm;

use DB;

trait DataGroupTrait
{

    /**
     * @name   默认分组
     * @author xiaojian
     * @param  none
     * @return array[..[grounpid,groupdata]..]
     * @todo   特殊查询需要定制
     */
    public function groupData()
    {
        $groupKey=$this->groupConfig['groupKey'];
        $groupParams=$this->groupConfig['groupParams'];

        $selects = [$groupKey];

        foreach ($groupParams as $value) {
            $selects[] = DB::raw("group_concat($value) as _$value");
        }

        $sql= $this->select($selects)->groupBy($groupKey);

        $groups = $sql->get()->toArray();

        foreach ($groups as $index => $value) {
            foreach ($groupParams as $value) {
                $groups[$index][$value] = explode(',', $groups[$index]["_$value"]);
                unset($groups[$index]["_$value"]);
            }
        }

        $result=array();

        foreach ($groups as $value) {
            $rows=array();
            for ($i=0; $i<count($value[$groupParams[0]]); $i++) {
                $row=[$groupKey=>$value[$groupKey]];
                foreach ($groupParams as $params) {
                    $row[$params]=$value[$params][$i];
                }
                $rows[]=$row;
            }
            $result[]=[$groupKey=>$value[$groupKey],'groups'=>$rows];
        }

        return $result;
    }
}
