<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'name', 'parent', 'desc'
    ];
    public function parentCompany(){
    	return $this->belongsTo('App\Company', 'parent', 'id');
    }
    public function nextRecord(){
    	$output = Company::where('id', '>', $this->id)->first();
    	if($output){
    		return $output->id;
    	}else{
    		return $this->id;
    	}
    }
    public function previousRecord(){
    	$output = Company::where('id', '<', $this->id)->first();
    	if($output){
    		return $output->id;
    	}else{
    		return $this->id;
    	}
    }
    public function oldestRecord(){
    	return Company::orderBy('id', 'asc')->first()->id;
    }
    public function newestRecord(){
    	return Company::orderBy('id', 'desc')->first()->id;
    }
}
