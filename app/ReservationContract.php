<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Invoice;
class ReservationContract extends Model
{
    //
    protected $table = "reservationcontract";
    public function LatestInvoice(){
        $invoice = $this->Invoices()->orderBy('date','desc')->orderBy('id', 'desc')->first();
        if($invoice){
            return $invoice;
        } else{
            return null;
        }
    }
    public function LatestDueDate(){
        $invoice = $this->Invoices()->orderBy('duedate','desc')->orderBy('id','desc')->first();
        if($invoice){
            return $invoice->duedate;
        }
    }
    public function LatestBillingDate(){
        $invoice = $this->Invoices()->orderBy('date','desc')->orderBy('id','desc')->first();
        if($invoice){
            return $invoice->date;
        }
    }
    public function Property(){
    	return $this->belongsTo('App\Property', 'property_id', 'id')->where('company_id', Auth::user()->company_id);
    }
    public function Unit(){
    	return $this->belongsTo('App\Unit', 'unitnumber', 'unitCode')->where('company_id', Auth::user()->company_id);
    }
    public function Tenant(){
    	return $this->belongsTo('App\Tenants', 'tenants_id', 'id')->where('company_id', Auth::user()->company->id);
    }
    public function haveInvoices(){
        $invoice = Invoice::where('reservationcontract_id', $this->id)->where('company_id', Auth::user()->company->id)->first();
        if($invoice != null){
            return true;
        }
        return false;
    }
    public function Invoices(){
        return $this->hasMany('App\Invoice', 'reservationcontract_id', 'id')->where('company_id', Auth::user()->company->id);
    }
    public function isExpired(){

        $dateToday = date('Y-m-d');
        if($dateToday > $this->enddate){
            return true;
        }
        else{
            return false;
        }
    }
    public function Balance(){
        $balance = 0;
        foreach($this->Invoices as $invoice){
            $balance += $invoice->Balance();
        }
        return $balance;
    }
}
