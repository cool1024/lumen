<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
    protected $fillable = [
        'remember_token','created_time','updated_time'
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'remember_token',
    ];

    /**
     * login params
     *
     * @var array
     */
    public static $logins=['email','password'];

    /**
     * signup params
     *
     * @var array
     */
    public static $signs=[
        'primary'=> ['email'],
        'secondary'=>['name','password'],
        'secert'=>['password']
     ];
}
