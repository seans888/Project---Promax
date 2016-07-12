<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usertype_code', 'company_id', 'username', 'password', 'token', 'status', 'email','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token',
    ];
    protected $table = 'users';

    public function UserType(){
        return $this->belongsTo('App\UserType','usertype_code','code');
    }
   
    public function company(){
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }


}
