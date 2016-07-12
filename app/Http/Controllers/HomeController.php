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
use App\Employee;
class HomeController extends Controller
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
    public function myaccount(){
        return view('myaccount');
    }

    public function postChangePassword(Request $request){
        $rules = [
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:4',
            'password_confirmation' => 'required'
            
        ];

        $this->validate($request, $rules);
        $user = User::where('id', Auth::user()->id)->where('company_id', Auth::user()->company_id);
        if(Hash::check($request->oldpassword, Auth::user()->password) ){
            Auth::user()->password =  Hash::make($request->password);
            Auth::user()->save();
        } else{
            return redirect('/myaccount')->withErrors('Wrong current password');
        }
        return redirect('/myaccount')->with('affirm', 'Change password was successful!');
    }
    public function postSaveAccountDetails(Request $request){
        $rules = [
            'username' => 'required',
            'email' => 'required'
            
        ];
        if($request->has('name')){
            $rules['name'] = 'required';
        }
        $this->validate($request, $rules);
        
        Auth::user()->username = $request->username;
        Auth::user()->email = $request->email;
        if($request->has('name')){
            Auth::user()->name = $request->name;
        }
        Auth::user()->save();
        return redirect('/myaccount');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch(Auth::user()->usertype_code){
            case Strings::Admin():
                return redirect('/myaccount');

            break;
           default:
           return redirect('/myaccount');
           break;
        }
    }
   
}
