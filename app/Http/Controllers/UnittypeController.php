<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Unittype;
use App\Property;
use App\Unit;
class UnittypeController extends Controller
{
    //
    public function unittypelist(){
        $data['title'] = "Unit type";
        $data['header'] = "List of Unit types";
        $data['Model'] = Unittype::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.UnittypeTable";
        $data['canAdd'] = Auth::user()->canAdd('unittype');
        $data['create'] = "/unittype/new";

        return view('listview', $data);
    }
    public function getunittype($id){
    	 $unittype = Unittype::where('unittype', $id)->where('company_id', Auth::user()->company_id)->first();
        if($unittype == null){
            return redirect('/unittype/list/');
        }
        $data['Model'] = $unittype;
        $data['ModelURI'] = "Unittype";
        $data['ModelIDnew'] = "getunittype_new";
        $data['ModelIDdelete'] = "getunittype_delete";
        $data['title'] = "Unit type";
        $data['formViewPartial'] = "partials.unittypeForm";
        $data['ModelURIlistview'] = "unittype/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetunittype";
		$data['create'] = "/unittype/new";

        $data['canadd'] = Auth::user()->canAdd('unittype');
        $data['cansave'] = Auth::user()->cansave('unittype');
        $data['candelete'] = Auth::user()->candelete('unittype');

        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
     public function newunittype(Request $request){
    	 $unittype = new Unittype();
        
        $data['Model'] = $unittype;
        $data['ModelURI'] = "Unittype";
        $data['ModelIDnew'] = "getunittype_new";
        $data['ModelIDdelete'] = "getunittype_delete";
        $data['title'] = "Unit type";
        $data['formViewPartial'] = "partials.unittypeForm";
        $data['ModelURIlistview'] = "unittype/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formgetunittype";
		$data['create'] = "/unittype/new";

        $data['canadd'] = Auth::user()->canAdd('unittype');
        $data['cansave'] = Auth::user()->cansave('unittype');
        $data['candelete'] = Auth::user()->candelete('unittype');


        if(Auth::user()->canAdd('unittype') == false || Auth::user()->canAdd('unittype') == 0){
            return $this->unittypelist();
        }
        $data['Model'] = $unittype;
		$data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
		return view('formView2', $data);
    }
    public function postunittype(Request $request = null, $id = null){
        
        $unittype = new Unittype();
        $affirmationMessage = "Unit type created successfully!";
        if($request->has('unittype') && $request->unittype != null){
            $unittype = Unittype::where('unittype', $request->unittype)->where('company_id', Auth::user()->company_id)->first();
            if($unittype){
                
                $affirmationMessage = "Unit type updated successfully!";
            } else{
                //putting new user code results in "add" function
                $unittype = new Unittype();
                $affirmationMessage = "Unit type created successfully!";
            }
        }
        $unittype->unittype = $request->unittype;
        $unittype->company_id = Auth::user()->company_id;
        $unittype->save();
        
        return redirect('/unittype/get/' . $unittype->unittype)->with('affirm', $affirmationMessage);
    }
    public function deleteunittype(Request $request, $id){
        $unittype = Unittype::where('unittype', $id)->where('company_id', Auth::user()->company_id)->first();
        $unittype->delete();
        $affirmationMessage = "Unit type deleted successfully!";
        return redirect('/unittype/list/')->with('affirm', $affirmationMessage);
    }
}
