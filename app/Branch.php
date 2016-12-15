<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    //
    protected $table = 'branch';
    public function Tenants(){
    	return $this->hasMany('App\Tenants', 'branch_id', 'id');
    }
}
