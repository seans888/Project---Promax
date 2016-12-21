<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payments;
use Auth;
class InvoicePayments extends Model
{
    //
    protected $table = "invoicepayments";
    public function Payment(){
    	return $this->belongsTo('App\Payments', 'payments_id', 'id')->where('company_id', Auth::user()->company_id);
    }
    public function Payments(){
    	return $this->hasMany('App\Payments', 'id', 'payments_id')->where('company_id', Auth::user()->company_id);
    }
    public function Invoice(){
    	return $this->belongsTo('App\Invoice', 'invoice_id','id')->where('company_id', Auth::user()->company_id);
    }
    public function Invoices(){
    	return $this->hasMany('App\Invoice', 'id','invoice_id')->where('company_id', Auth::user()->company_id);
    }
    public function InvoiceBalance(){
        $invoiceId = $this->Invoice->id;
        $totalPaymentAmountForInvoice = InvoicePayments::where('company_id', Auth::user()->company_id)->where('invoice_id', $invoiceId)->sum('paymentAmountForInvoice');
        $balance = $this->Invoice->Amount() - $totalPaymentAmountForInvoice;
        return $balance;
    }
    public function PaymentAvailableBalance(){
        $balance = 0;
        if($this->paymentAmountForInvoice > $this->Invoice->Amount()){
            $balance = $this->paymentAmountForInvoice - $this->Invoice->Amount();
        }
        return $balance;
    }
    public function InvoicesWithZeroBalance(){
        $IDs = [];
        foreach($this->Invoices as $invoice){
            if($invoice->Balance() == 0){
                array_push($IDs, $invoice->id);
            } 
        }
        return $IDs;
    }
    
}
