<?php
namespace App\Api\Traits\Orm;

trait DataSortTrait
{

    public function sort($ids, $sort_key)
    {

        $result = false;

        $sort_rows = $this->select('id', $sort_key)->whereIn('id', $ids)->get()->toArray();

        if (count($sort_rows) > 0 && count($ids) == count($sort_rows)) {
            $levels = array();
            foreach ($sort_rows as $row) {
                $levels[] = $row[$sort_key];
            }

            sort($levels);

            for ($i = 0; $i < count($ids); $i++) {
                $this->where('id', $ids[$i])->update([$sort_key => $levels[$i]]);
            }

            $result = true;
        }

        return $result;
    }

    public function rsort($ids, $sort_key)
    {
        $result = false;

        $sort_rows = $this->select('id', $sort_key)->whereIn('id', $ids)->get()->toArray();

        if (count($sort_rows) > 0 && count($ids) == count($sort_rows)) {
            $levels = array();
            foreach ($sort_rows as $row) {
                $levels[] = $row[$sort_key];
            }

            rsort($levels);

            for ($i = 0; $i < count($ids); $i++) {
                $this->where('id', $ids[$i])->update([$sort_key => $levels[$i]]);
            }

            $result = true;
        }

        return $result;
    }
}
