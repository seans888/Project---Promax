<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notifications;
use Auth;
use App\Strings;
use App\Company;
use Illuminate\Http\Response;
use Hash;
use App\Property;
use App\Employee;
class PropertyController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');

    }
    public function apiProperty($id){
        $Property = Property::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        return $Property;
    }

    public function propertylist(){
        $data['title'] = "Properties";
        $data['header'] = "List of Properties";
        $data['Model'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.PropertyTable";
        $data['canAdd'] = Auth::user()->canAdd('properties');
        $data['create'] = "/property/new";
        return view('listview', $data);
    }
     public function getproperty($id){
        $Property = Property::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($Property == null){
            return redirect('/property/list/');
        }
        $data['Model'] = $Property;
        $data['ModelURI'] = "Properties";
        $data['ModelIDnew'] = "getProperty_new";
        $data['ModelIDdelete'] = "getProperty_delete";
        $data['title'] = "Property";
        $data['formViewPartial'] = "partials.PropertyForm";
        $data['ModelURIlistview'] = "property/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetProperty";

        $data['create'] = "/property/new";

        $data['canadd'] = Auth::user()->canAdd('properties');
        $data['cansave'] = Auth::user()->cansave('properties');
        $data['candelete'] = Auth::user()->candelete('properties');

        return view('formView2', $data);
    }
     public function newproperty(){
        $data['Model'] = new Property();
        $data['ModelURI'] = "Property";
        $data['ModelIDnew'] = "getProperty_new";
        $data['ModelIDdelete'] = "getProperty_delete";

        $data['title'] = "Property";
        $data['formViewPartial'] = "partials.PropertyForm";
        $data['ModelURIlistview'] = "property/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetProperty";

        $data['canadd'] = Auth::user()->canAdd('properties');
        $data['cansave'] = Auth::user()->cansave('properties');
        $data['candelete'] = Auth::user()->candelete('properties');



        if(Auth::user()->canAdd('properties') == false || Auth::user()->canAdd('properties') == 0){
            return $this->propertylist();
        }
        $data['create'] = "/property/new/";
        $data['companies'] = Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        return view('formView2', $data);
    }
    public function postproperty(Request $request = null, $id = null){
    	 $this->validate($request, [
            'name' => 'required'
            ,'desc' => 'required'
            
        ]);
    	$Property = new Property();
    	$affirmationMessage = "Property created successfully!";
		if($request->has('id')){
	    	$Property = Property::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
	    	if($Property){
                $Property->id = $request->id;
				$affirmationMessage = "Property information updated successfully!";
			} else{
                //putting new Property code results in "add" function
		    	$Property = new Property();
			}
    	}
    	if($id == null){
            $Property = Property::where('name', $request->name)->where('company_id', Auth::user()->company_id)->first();
            if($Property != null){
                $affirmationMessage = "Property information updated successfully!";
            } else{
                $Property = new Property();
                $affirmationMessage = "Property created successfully!";
            }
        }
        $Property->name = $request->name;
        $Property->desc = $request->desc;
        $Property->company_id = Auth::user()->company_id;
        
        $Property->save();
        return redirect('/property/get/' . $Property->id)->with('affirm', $affirmationMessage);
    }
    public function deleteproperty($id){
        $Property = Property::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $Property->delete();
        $affirmationMessage = "Projerty deleted successfully!";
        return redirect('/property/list/')->with('affirm', $affirmationMessage);
    } 
    public function deletePropertyByPropertyname($Propertyname){
        $Property = Property::where('Propertyname', $Propertyname)->where('company_id', Auth::user()->company_id)->first();
        $Property->delete();
        $affirmationMessage = "Property deleted successfully!";
        return redirect('/property/list/')->with('affirm', $affirmationMessage);
    }
}
