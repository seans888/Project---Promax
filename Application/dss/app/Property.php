<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Property extends Model
{
    //
    protected $table = 'property';
    public function Tenants(){
    	return $this->hasMany('App\ReservationContract', 'property_id', 'id')->where('company_id', Auth::user()->company_id)->whereIn('status', 
    		['Active','Draft']);
    }
}
