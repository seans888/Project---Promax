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
use App\AccessLevel;
use App\UserTypeAccessLevel;
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
     public function updateusertypeaccesslevel(Request $request, $id){
        if(Auth::user()->usertype_code == Strings::Admin() || Auth::user()->usertype_code == Strings::Superadmin()){
            $UserTypeAccessLevel = UserTypeAccessLevel::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
            $UserTypeAccessLevel->enabled = $request->enabled;
             $UserTypeAccessLevel->canadd = $request->canadd;
              $UserTypeAccessLevel->cansave = $request->cansave;
               $UserTypeAccessLevel->candelete = $request->candelete;
            $UserTypeAccessLevel->save();
            return $UserTypeAccessLevel;
        } else{
            return null;
        }
    }
	public function apiUserType($code){
        $UserType = UserType::where('code', $code)->where('company_id', Auth::user()->company_id)->first();
        return $UserType;
    }
    public function UserTypes(){
        $data['title'] = "User Types";
        $data['header'] = "List of User Types";
        $data['Model'] = UserType::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.UserTypeTable";
        $data['canAdd'] = Auth::user()->canAdd('usertypes');
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

        $data['canadd'] = Auth::user()->canAdd('usertypes');
        $data['cansave'] = Auth::user()->cansave('usertypes');
        $data['candelete'] = Auth::user()->candelete('usertypes');

        $data['title'] = "User Type";
        $data['formViewPartial'] = "partials.UserTypeForm";
        $data['ModelURIlistview'] = "usertypes";
        $listOfIDs = "";
            $usertype = $UserType;
            $UserTypeAccessLevelsAllRaw = $usertype->UserTypeAccessLevel();
            $UserTypeAccessLevelsAll = $UserTypeAccessLevelsAllRaw->where('company_id', Auth::user()->company_id)
            ->where('AccessLevel_code', '!=', 'myaccount')->get();
                            
        foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel){
            $listOfIDs .= $UserTypeAccessLevel->id . ",";
        }
        $listOfIDs = rtrim($listOfIDs, ',');

        $data['UserTypeAccessLevelIDs'] = $listOfIDs;
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
        $data['title'] = "User Type";
        $data['formViewPartial'] = "partials.UserTypeForm";
        $data['ModelURIlistview'] = "usertypes";
        $data['create'] = "/usertype/";
        $data['formID'] = "formGetUserType";
        $company_id = Auth::user()->company_id;
       
        $data['canadd'] = Auth::user()->canAdd('usertypes');
        $data['cansave'] = Auth::user()->cansave('usertypes');
        $data['candelete'] = Auth::user()->candelete('usertypes');
        $listOfIDs = "";
            $usertype = new UserType();
            $UserTypeAccessLevelsAllRaw = $usertype->UserTypeAccessLevel();
            $UserTypeAccessLevelsAll = $UserTypeAccessLevelsAllRaw->where('company_id', Auth::user()->company_id)
            ->where('AccessLevel_code', '!=', 'myaccount')->get();
                            
        foreach($UserTypeAccessLevelsAll as $UserTypeAccessLevel){
            $listOfIDs .= $UserTypeAccessLevel->id . ",";
        }
        $listOfIDs = rtrim($listOfIDs, ',');

        $data['UserTypeAccessLevelIDs'] = $listOfIDs;
         if(Auth::user()->canAdd('usertypes') == false || Auth::user()->canAdd('usertypes') == 0){
            return $this->UserTypes();
        }
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
				$affirmationMessage = "User Type information updated successfully!";
			} else{
                //putting new UserType code results in "add" function
		    	$UserType = new UserType();
		    	$UserType->code = $request->code;
                
        
                $affirmationMessage = "User Type created successfully!";
			}
    	}
    	if($code == null){
            $UserType = new UserType();
            $UserType->code = $request->code;
            $affirmationMessage = "User Type created successfully!";
        }
    	$UserType->code = $request->code;
    	$UserType->desc=$request->desc;
    	$UserType->company_id = Auth::user()->company_id;
    	$UserType->notes = $request->notes;
    	
            
        $UserType->save();
        if($affirmationMessage == "User Type created successfully!"){
            AccessLevel::saveUserLevelAccess($UserType->code);
        } 
        return redirect('/usertype/' . $UserType->code)->with('affirm', $affirmationMessage);
    }
    public function deleteUserType($code){
        $UserType = UserType::where('code', $code)->where('company_id', Auth::user()->company_id)->first();
        $UserType->delete();
        $affirmationMessage = "User Type deleted successfully!";
        return redirect('/usertype/')->with('affirm', $affirmationMessage);
    }
    
    
}