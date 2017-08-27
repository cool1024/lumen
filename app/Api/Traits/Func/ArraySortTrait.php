<?php

namespace App\Api\Traits\Func;

trait ArraySortTrait
{

    function array_sort_params($arrays, $sort_key, $sort_order = SORT_ASC, $sort_type = SORT_NUMERIC)
    {
        foreach ($arrays as $array) {
            $key_arrays[] = $array[$sort_key];
        }
        array_multisort($key_arrays, $sort_order, $sort_type, $arrays);
        return $arrays;
    }
}
