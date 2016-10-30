<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\UserType;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Support\Facades\Lang;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
   use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectTo = '/';
    protected $username = 'username';
    protected $registerView = 'auth.register2';
    protected $loginView = 'auth.login2';
    protected $mandatoryChangePassword = '/mandatoryChangePassword';
    public function __construct()
    {
        //$this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
            'company' => 'required',
            'usertype' => 'required',
        ]);
    }

   
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'company_id' => $data['company'],
            'usertype_code' => $data['usertype'],

        ]);
    }
    public function showRegistrationForm()
    {
      $data['companies'] = Company::all();
      $data['userTypes'] = UserType::all();
      return view($this->registerView)->with($data);
    }
    public function showLoginForm()
    {
      $data['companies'] = Company::all();
      return view($this->loginView)->with($data);
    }
    // p
    protected function getCredentials(Request $request)
    {
        
        return $request->only($this->loginUsername(), 'password','company_id');
    }

     protected function sendFailedLoginResponse(Request $request)
    {
         
        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember','company_id'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessage(),
            ]);
    }
    protected function getFailedLoginMessageInactiveUser()
    {
        return Lang::has('auth.inactiveUser')
                ? Lang::get('auth.inactiveUser')
                : 'User is not activated by admin or is blocked';
    }
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
            $this->clearLoginAttempts($request);
        }

        if (method_exists($this, 'authenticated')) {
            return $this->authenticated($request, Auth::guard($this->getGuard())->user());
        }

        if(Auth::user()->status == "pending change password"){
            return redirect($this->mandatoryChangePassword);
        } else if(Auth::user()->status == "inactive"){
            Auth::logout();
            return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember','company_id'))
            ->withErrors([
                $this->loginUsername() => $this->getFailedLoginMessageInactiveUser(),
            ]);
        }

        return redirect()->intended($this->redirectPath());
    }
   
  
}
