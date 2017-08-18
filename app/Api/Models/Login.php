<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{

    protected $table='login';

    protected $fillable = ['token','device','uid','created_time','updated_time'];

}
