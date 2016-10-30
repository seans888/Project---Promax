<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    
static function stripos_array($needle, $haystacks){
    foreach($haystacks as $haystack) {
        if(($res = strpos($haystack, $needle)) !== false) {
            return $res;
        }
    }
    return false;
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usertype_code', 'company_id', 'username', 'password', 'token', 'status', 'email','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token',
    ];
    protected $table = 'users';

    public function UserType(){
        return $this->belongsTo('App\UserType','usertype_code','code');
    }
   
    public function company(){
        return $this->belongsTo('App\Company', 'company_id', 'id');
    }
    public function canAdd($module){
        $UserTypeAccessLevelsRaw = Auth::user()->UserType->UserTypeAccessLevel();
        $UserTypeAccessLevel = $UserTypeAccessLevelsRaw->where('AccessLevel_code', $module)->first();
        
        return $UserTypeAccessLevel->canadd;
    }
    public function canSave($module){
        $UserTypeAccessLevelsRaw = Auth::user()->UserType->UserTypeAccessLevel();
        $UserTypeAccessLevel = $UserTypeAccessLevelsRaw->where('AccessLevel_code', $module)->first();
        
        return $UserTypeAccessLevel->cansave;
    }
    public function canDelete($module){
        $UserTypeAccessLevelsRaw = Auth::user()->UserType->UserTypeAccessLevel();
        $UserTypeAccessLevel = $UserTypeAccessLevelsRaw->where('AccessLevel_code', $module)->first();
        
        return $UserTypeAccessLevel->candelete;
    }
    public function hasPrivelege($path){
        $output = false;
        $path = explode('/', $path);
        $path = $path[0];
        $UserTypeAccessLevelsRaw = Auth::user()->UserType->UserTypeAccessLevel();
        $UserTypeAccessLevels = $UserTypeAccessLevelsRaw->where('enabled', 1)->where('company_id', Auth::user()->company_id)->get();
        $AccessLevelLinks = []; 
        foreach($UserTypeAccessLevels as $UserTypeAccessLevel){
            $AccessLevelLinks[] = $UserTypeAccessLevel->AccessLevel->uri;
          
        }
        //example: allowed is path: employee, accesslevel links: employees, notifications
        if(User::stripos_array($path, $AccessLevelLinks) === false){
            
        } else{
            $output = true;
        }
        if($output == false){
            echo "Module not allowed for user";
            exit();
        }
       return $output;

    }
}
