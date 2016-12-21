<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Strings extends Model
{
    //
    public static function Admin(){
    	return "admin";
    }
   public static function Superadmin(){
    	return "superadmin";
    }
  
}
