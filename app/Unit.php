<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Unit extends Model
{
    //
    protected $table = 'unit';
     public $incrementing = false;
    public $primaryKey = 'unitCode';
    public function UnitType(){
    	return $this->belongsTo('App\Unittype', 'unittype_unittype', 'unittype')->where('company_id', Auth::user()->company_id);
    }
    public function Property(){
    	return $this->belongsTo('App\Property', 'property_id', 'id')->where('company_id', Auth::user()->company_id);
    }
}
