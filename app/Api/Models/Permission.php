<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $table='permission';

    protected $fillable = ['id','name','description','key'];

}
