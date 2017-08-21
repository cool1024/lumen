<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table='role';

    protected $fillable = ['id','name','description','permissions'];
}
