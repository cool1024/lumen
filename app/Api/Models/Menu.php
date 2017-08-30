<?php
namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;
use App\Api\Traits\Orm\DataGroupTrait;
use App\Api\Traits\Orm\DataSortTrait;

class Menu extends Model
{

    use DataGroupTrait,DataSortTrait;

    protected $table = 'menu';

    public $timestamps = false;

    protected $fillable = ['id', 'icon', 'title', 'url', 'parentid'];

    private $groupConfig=[
        'groupKey'=>'parentid',//分组依据
        'groupParams' => ['id', 'icon', 'title', 'url','level','permissionid'],//查询字段
    ];

}
