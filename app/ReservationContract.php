<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class ReservationContract extends Model
{
    //
    protected $table = "reservationcontract";
    public function Property(){
    	return $this->belongsTo('App\Property', 'property_id', 'id')->where('company_id', Auth::user()->company_id);
    }
    public function Unit(){
    	return $this->belongsTo('App\Unit', 'unitnumber', 'unitCode')->where('company_id', Auth::user()->company_id);
    }
    public function Tenant(){
    	return $this->belongsTo('App\Tenants', 'tenants_id', 'id')->where('company_id', Auth::user()->company->id);
    }
}
