<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InvoiceDetails;
use Auth;
use App\Payments;
use App\Constants;
class Invoice extends Model
{
    //
    protected $table = "invoice";
    public function datePaid(){
        if($this->Payments()->first() == null){
            return null;
        }
        return $this->Payments()->orderBy('date', 'desc')->first()->date;
    }
    public function penalizableAmount(){
        $documents = $this->InvoiceDetails;
        $amount = 0;
        foreach($documents as $document){
            if($document->DocumentItem->penalizable){
                $amount += $document->amount;
            }
        }
        return $amount;
    }
    public function wtaxableAmount(){
        $documents = $this->InvoiceDetails;
        $amount = 0;
        foreach($documents as $document){
            if($document->DocumentItem->wtaxable){
                $amount += $document->amount;
            }
        }
       return $amount;
    }
    public function vataxableAmount(){
        $documents = $this->InvoiceDetails;
        $amount = 0;
        foreach($documents as $document){
            if($document->DocumentItem->vataxable){
                $amount += $document->amount;
            }
        }
        return $amount;
    }
    public function Amount(){
        $documents = $this->InvoiceDetails;
        $amount = 0;
        foreach($documents as $document){
            $amount += $document->amount;
        }
    	return $amount;
    }
    public function Balance(){
        if($this->InvoicePayments == null){
            return $this->Amount();
        }
        $balance = $this->InvoicePayments->InvoiceBalance();
    	return $balance;
    }
    public function InvoiceDetails(){
        return $this->hasMany('App\InvoiceDetails', 'invoice_id', 'id')->where('company_id', Auth::user()->company->id);
    }
    public function Tenant(){
        return $this->belongsTo('App\Tenants', 'payer_id', 'id')->where('company_id', Auth::user()->company_id);
    }
    public function InvoicePayments(){
        return $this->belongsTo('App\InvoicePayments', 'id', 'invoice_id')->where('company_id', Auth::user()->company_id);
    }
    public function Payments(){
        return $this->belongsToMany('App\Payments', 'InvoicePayments', 'invoice_id', 'payments_id');
    }

     
}
