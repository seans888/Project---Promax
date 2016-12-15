<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Property;
use App\Unit;
class DecisionSupportController extends Controller
{
    //
    public function dss(){
        $data['title'] = "Decision Support";
        $data['header'] = "dss";
        $data['tablePartialView'] = "";
        $data['canAdd'] = false;
        $data['create'] = "";
        return view('dss', $data);
    }
    public function getdecisionsupport($id){
    	 $decisionsupport = decisionsupport::where('decisionsupport', $id)->where('company_id', Auth::user()->company_id)->first();
        if($decisionsupport == null){
            return redirect('/decisionsupport/list/');
        }
        $data['Model'] = $decisionsupport;
        $data['ModelURI'] = "decisionsupport";
        $data['ModelIDnew'] = "getdecisionsupport_new";
        $data['ModelIDdelete'] = "getdecisionsupport_delete";
        $data['title'] = "Unit type";
        $data['formViewPartial'] = "partials.decisionsupportForm";
        $data['ModelURIlistview'] = "decisionsupport/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetdecisionsupport";
		$data['create'] = "/decisionsupport/new";

        $data['canadd'] = Auth::user()->canAdd('decisionsupport');
        $data['cansave'] = Auth::user()->cansave('decisionsupport');
        $data['candelete'] = Auth::user()->candelete('decisionsupport');

        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
     public function newdecisionsupport(Request $request){
    	 $decisionsupport = new decisionsupport();
        
        $data['Model'] = $decisionsupport;
        $data['ModelURI'] = "decisionsupport";
        $data['ModelIDnew'] = "getdecisionsupport_new";
        $data['ModelIDdelete'] = "getdecisionsupport_delete";
        $data['title'] = "Unit type";
        $data['formViewPartial'] = "partials.decisionsupportForm";
        $data['ModelURIlistview'] = "decisionsupport/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formgetdecisionsupport";
		$data['create'] = "/decisionsupport/new";

        $data['canadd'] = Auth::user()->canAdd('decisionsupport');
        $data['cansave'] = Auth::user()->cansave('decisionsupport');
        $data['candelete'] = Auth::user()->candelete('decisionsupport');


        if(Auth::user()->canAdd('decisionsupport') == false || Auth::user()->canAdd('decisionsupport') == 0){
            return $this->decisionsupportlist();
        }
        $data['Model'] = $decisionsupport;
		$data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
		return view('formView2', $data);
    }
    public function postdecisionsupport(Request $request = null, $id = null){
        
        $decisionsupport = new decisionsupport();
        $affirmationMessage = "Unit type created successfully!";
        if($request->has('decisionsupport') && $request->decisionsupport != null){
            $decisionsupport = decisionsupport::where('decisionsupport', $request->decisionsupport)->where('company_id', Auth::user()->company_id)->first();
            if($decisionsupport){
                
                $affirmationMessage = "Unit type updated successfully!";
            } else{
                //putting new user code results in "add" function
                $decisionsupport = new decisionsupport();
                $affirmationMessage = "Unit type created successfully!";
            }
        }
        $decisionsupport->decisionsupport = $request->decisionsupport;
        $decisionsupport->company_id = Auth::user()->company_id;
        $decisionsupport->save();
        
        return redirect('/decisionsupport/get/' . $decisionsupport->decisionsupport)->with('affirm', $affirmationMessage);
    }
    public function deletedecisionsupport(Request $request, $id){
        $decisionsupport = decisionsupport::where('decisionsupport', $id)->where('company_id', Auth::user()->company_id)->first();
        $decisionsupport->delete();
        $affirmationMessage = "Unit type deleted successfully!";
        return redirect('/decisionsupport/list/')->with('affirm', $affirmationMessage);
    }
}
