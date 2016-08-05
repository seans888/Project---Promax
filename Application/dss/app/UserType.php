<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class UserType extends Model
{
    //
    public $incrementing = false;
    public $primaryKey = 'code';
    protected $table = 'usertype';
    protected $fillable = ['UserType', 'company_id'];
    public function UserTypeAccessLevel(){
    	return $this->hasMany('App\UserTypeAccessLevel', 'usertype_code', 'code');
    }
   
}
