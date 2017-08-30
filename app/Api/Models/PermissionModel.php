<?php
namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{

    protected $table = 'model';

    protected $fillable = ['id', 'name'];

    public $timestamps = false;    

}
