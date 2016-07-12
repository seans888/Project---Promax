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
use App\SegmentKey;
use App\Department;
class UserController extends Controller
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
	public function apiuser($username){
        $user = User::where('username', $username)->where('company_id', Auth::user()->company_id)->first();
        return $user;
    }
    public function apiuserById($id){
        $user = User::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        return $user;
    }
    public function users(){
        $data['title'] = "users";
        $data['header'] = "List of users";
        $data['Model'] = User::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.userTable";
        $data['canAdd'] = true;
        $data['create'] = "/user/";
        return view('listview', $data);
    }
     public function getuser($id){
        $user = User::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($user == null){
            return redirect('/user/');
        }
        $data['Model'] = $user;
        $data['ModelURI'] = "user";
        $data['ModelIDnew'] = "getuser_new";
        $data['ModelIDdelete'] = "getuser_delete";
        $data['title'] = "user";
        $data['formViewPartial'] = "partials.userForm";
        $data['ModelURIlistview'] = "users";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formGetUser";
        $data['companies'] = Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        return view('formView', $data);
    }
     public function newUser(){
        $data['Model'] = new user();
        $data['ModelURI'] = "user";
        $data['ModelIDnew'] = "getuser_new";
        $data['ModelIDdelete'] = "getuser_delete";

        $data['title'] = "user";
        $data['formViewPartial'] = "partials.userForm";
        $data['ModelURIlistview'] = "users";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formGetUser";
        $data['companies'] = Company::where('id' , $company_id)->orWhere('parent', $company_id)->get();
        return view('formView', $data);
    }
    public function postUser(Request $request = null, $id = null){
    	 $this->validate($request, [
            'username' => 'required'
            ,'UserType' => 'required'
            ,'status' => 'required'
            
        ]);
    	$user = new user();
    	$affirmationMessage = "user created successfully!";
		if($request->has('username')){
	    	$user = User::where('username', $request->username)->where('company_id', Auth::user()->company_id)->first();
	    	if($user){
                $user->username = $request->username;
				$affirmationMessage = "user information updated successfully!";
			} else{
                //putting new user code results in "add" function
		    	$user = new user();
		    	$user->username = $request->username;
                $user->password = bcrypt('setup');
                $user->status = "pending change password";
                $affirmationMessage = "user created successfully!";
			}
    	}
    	if($id == null){
            $user = new user();
            $affirmationMessage = "user created successfully!";
            $user->password = bcrypt('setup');
            $user->status = "pending change password";
            $affirmationMessage = "user created successfully!";
        }
    	$user->username = $request->username;
        $user->name = $request->name;
        $user->usertype_code = $request->UserType;
        $user->status = $request->status;
        $user->company_id = Auth::user()->company_id;
        $user->email = $request->email;
        $user->save();
        
        return redirect('/user/' . $user->id)->with('affirm', $affirmationMessage);
    }
    public function deleteUser($id){
        $user = User::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $user->delete();
        $affirmationMessage = "user deleted successfully!";
        return redirect('/user/')->with('affirm', $affirmationMessage);
    } 
    public function deleteUserByUsername($username){
        $user = User::where('username', $username)->where('company_id', Auth::user()->company_id)->first();
        $user->delete();
        $affirmationMessage = "user deleted successfully!";
        return redirect('/user/')->with('affirm', $affirmationMessage);
    }
    
}