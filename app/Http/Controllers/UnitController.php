<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unit;
use Auth;
class UnitController extends Controller
{
    //
    public function apigetbyproperty($property_id){
    	$units = Unit::where('company_id', Auth::user()->company_id)->where('property_id', $property_id)->get();
    	$htmlUnits = "<option>--Please Select--";
    	foreach($units as $unit){
    		$htmlUnits .= "<option value = '". json_encode(['unitcode' => $unit->unitCode, 'property_id' => $unit->property_id, 'unittype' => $unit->unittype_unittype]) ."'>$unit->unitCode</option>";
    	}
    	return $htmlUnits;
    }
}
