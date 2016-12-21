<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Unit;
use Auth;
use App\Property;
use App\Unittype;
class UnitsController extends Controller
{
    //
     //
    public function unitslist(){
        $data['title'] = "Units";
        $data['header'] = "List of Units";
        $data['Model'] = Unit::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.unitsTable";
        $data['canAdd'] = Auth::user()->canAdd('units');;
        $data['create'] = "/units/new";

        return view('listview', $data);
    }
    public function getunits($id){
    	 $units = Unit::where('unitCode', $id)->where('company_id', Auth::user()->company_id)->first();
        if($units == null){
            return redirect('/units/list/');
        }
        $data['Model'] = $units;
        $data['ModelURI'] = "units";
        $data['ModelIDnew'] = "getunits_new";
        $data['ModelIDdelete'] = "getunits_delete";
        $data['title'] = "Unit";
        $data['formViewPartial'] = "partials.unitsForm";
        $data['ModelURIlistview'] = "units/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetunits";
		$data['create'] = "/units/new";

        $data['canadd'] = Auth::user()->canAdd('units');
        $data['cansave'] = Auth::user()->cansave('units');
        $data['candelete'] = Auth::user()->candelete('units');

        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        $data['Unittypes'] = Unittype::where('company_id', Auth::user()->company_id)->get();

        return view('formView2', $data);
    }
     public function newunits(Request $request){
    	 $units = new Unit();
        
        $data['Model'] = $units;
        $data['ModelURI'] = "units";
        $data['ModelIDnew'] = "getunits_new";
        $data['ModelIDdelete'] = "getunits_delete";
        $data['title'] = "Unit";
        $data['formViewPartial'] = "partials.unitsForm";
        $data['ModelURIlistview'] = "units/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formgetunits";
		$data['create'] = "/units/new";


        $data['canadd'] = Auth::user()->canAdd('units');
        $data['cansave'] = Auth::user()->cansave('units');
        $data['candelete'] = Auth::user()->candelete('units');

        if(Auth::user()->canAdd('units') == false || Auth::user()->canAdd('units') == 0){
            return $this->unitslist();
        }
        $data['Model'] = $units;
		$data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        $data['Unittypes'] = Unittype::where('company_id', Auth::user()->company_id)->get();

		return view('formView2', $data);
    }
    public function postunits(Request $request = null, $id = null){
        
        $units = new Unit();
        $affirmationMessage = "Unit type created successfully!";
        if($request->has('units') && $request->units != null){
            $units = Unit::where('units', $request->units)->where('company_id', Auth::user()->company_id)->first();
            if($units){
                
                $affirmationMessage = "Unit type updated successfully!";
            } else{
                //putting new user code results in "add" function
                $units = new Unit();
                $affirmationMessage = "Unit type created successfully!";
            }
        }
        $units->unitCode = $request->unitCode;
        $units->property_id = $request->property;
        $units->unittype_unittype = $request->unittype;
        $units->company_id = Auth::user()->company_id;
        $units->save();
        
        return redirect('/units/get/' . $units->unitCode)->with('affirm', $affirmationMessage);
    }
    public function deleteunits(Request $request, $id){
        $units = Unit::where('unitCode', $id)->where('company_id', Auth::user()->company_id)->first();
        $units->delete();
        $affirmationMessage = "Unit deleted successfully!";
        return redirect('/units/list/')->with('affirm', $affirmationMessage);
    }
}
