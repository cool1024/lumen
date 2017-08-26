<?php

/**
 * @file:    DataGroupTrait.php
 * @author:  xiaojian
 * @date:    2017-08-01
 * @exp:     提供了数据分组查询方法（只适用于少量数据）
 */

namespace App\Api\Traits;

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
        $selects = [$this->groupKey];

        foreach ($this->groupParams as $value) {
            $selects[] = DB::raw("group_concat($value) as $value");
        }

        $groups = $this->select($selects)->groupBy($this->groupKey)->get()->toArray();

        foreach ($groups as $index => $value) {
            foreach ($this->groupParams as $value) {
                $groups[$index][$value] = explode(',', $groups[$index][$value]);
            }
        }

        $result=[];
        
        foreach ($groups as $value) {
            
        }

        dd($groups);
    }

}
