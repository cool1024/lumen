<?php
namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;
use App\Api\Traits\DataGroupTrait;

class Menu extends Model
{

    use DataGroupTrait;

    protected $table = 'menu';

    protected $fillable = ['id', 'icon', 'title', 'url', 'parentid'];

     //分组依据
    private $groupKey = 'parentid';
     
    //查询字段
    private $groupParams = ['id', 'icon', 'title', 'url'];

}