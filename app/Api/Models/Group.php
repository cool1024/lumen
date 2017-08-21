<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table='group';

    protected $fillable = ['id','name','description','permissions'];
}
