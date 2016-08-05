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
use App\User;
use App\UserType;
use App\SegmentKey;
use App\Department;
class UserTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }
	public function apiUserType($code){
        $UserType = UserType::where('code', $code)->where('company_id', Auth::user()->company_id)->first();
        return $UserType;
    }
    public function UserTypes(){
        $data['title'] = "UserTypes";
        $data['header'] = "List of UserTypes";
        $data['Model'] = UserType::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.UserTypeTable";
        $data['canAdd'] = true;
        $data['create'] = "/usertype/";

        return view('listview', $data);
    }
     public function getUserType($code){
        $UserType = UserType::where('code', $code)->where('company_id', Auth::user()->company_id)->first();
        if($UserType == null){
            return redirect('/usertype/');
        }
        $data['Model'] = $UserType;
        $data['ModelURI'] = "usertype";
        $data['ModelIDnew'] = "getUserType_new";
        $data['ModelIDdelete'] = "getUserType_delete";

        $data['title'] = "UserType";
        $data['formViewPartial'] = "partials.UserTypeForm";
        $data['ModelURIlistview'] = "usertypes";
        $company_id = Auth::user()->company_id;
$data['create'] = "/usertype/";
        
        $data['formID'] = "formGetUserType";
        $data['companies'] = Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        return view('formView', $data);
    }
     public function newUserType(){
        $data['Model'] = new UserType();
        $data['ModelURI'] = "usertype";
        $data['ModelIDnew'] = "getUserType_new";
        $data['ModelIDdelete'] = "getUserType_delete";
        $data['title'] = "UserType";
        $data['formViewPartial'] = "partials.UserTypeForm";
        $data['ModelURIlistview'] = "usertypes";
        $data['create'] = "/usertype/";
        $data['formID'] = "formGetUserType";
        $company_id = Auth::user()->company_id;
       
        return view('formView', $data);
    }
    public function postUserType(Request $request = null, $code = null){
    	 $this->validate($request, [
            'code' => 'required'
        	,'desc' => 'required'
            
        ]);
    	$UserType = new UserType();
    	$affirmationMessage = "UserType created successfully!";
		if($request->has('code')){
	    	$UserType = UserType::where('code', $request->code)->where('company_id', Auth::user()->company_id)->first();
	    	if($UserType){
                $UserType->code = $request->code;
				$affirmationMessage = "UserType information updated successfully!";
			} else{
                //putting new UserType code results in "add" function
		    	$UserType = new UserType();
		    	$UserType->code = $request->code;
                
        
                $affirmationMessage = "UserType created successfully!";
			}
    	}
    	if($code == null){
            $UserType = new UserType();
            $UserType->code = $request->code;
            $affirmationMessage = "UserType created successfully!";
        }
    	$UserType->code = $request->code;
    	$UserType->desc=$request->desc;
    	$UserType->company_id = Auth::user()->company_id;
    	$UserType->notes = $request->notes;
    	
            
        $UserType->save();
    	
        return redirect('/usertype/' . $UserType->code)->with('affirm', $affirmationMessage);
    }
    public function deleteUserType($code){
        $UserType = UserType::where('code', $code)->where('company_id', Auth::user()->company_id)->first();
        $UserType->delete();
        $affirmationMessage = "UserType deleted successfully!";
        return redirect('/usertype/')->with('affirm', $affirmationMessage);
    }
    
}