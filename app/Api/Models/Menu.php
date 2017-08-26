<?php
namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;
use App\Api\Traits\DataGroupTrait;

class Menu extends Model
{

    use DataGroupTrait;

    protected $table = 'menu';

    protected $fillable = ['id', 'icon', 'title', 'url', 'parentid'];

    private $groupConfig=[
        'groupKey'=>'parentid',//分组依据
        'groupParams' => ['id', 'icon', 'title', 'url'],//查询字段
        'orderParams'=>['level','desc']//sort字段
    ];
}
