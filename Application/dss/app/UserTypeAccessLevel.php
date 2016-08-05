<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTypeAccessLevel extends Model
{
    //
    protected $table = 'usertypeaccesslevel';
    protected $fillable = ['usertype_code','accesslevel_code', 'enabled'];
    public function AccessLevel(){
    	return $this->hasOne('App\AccessLevel', 'code', 'AccessLevel_code');
   	}
   	public function getAccessLevel(){
   		return AccessLevel::where('code', $this->accesslevel_code);
   	}
}
