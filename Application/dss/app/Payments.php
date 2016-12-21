<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Invoice;
class Payments extends Model
{
    //
    protected $table = "payments";

    public function InvoiceNumber(){
        if($this->InvoicePayments == null || $this->InvoicePayments->first() == null){
            return null;
        }
        return $this->InvoicePayments->first()->Invoice->id;
    }
    public function Payer(){
        if($this->InvoicePayments == null || $this->InvoicePayments->first() == null){
            return null;
        }
    	return $this->InvoicePayments->first()->Invoice->Tenant->tenantname;
    }
    public function InvoicePayments(){
    	return $this->hasMany('App\InvoicePayments', 'payments_id', 'id')->where('company_id', Auth::user()->company_id);
    }

    public function ReferenceNumber(){
        if($this->InvoicePayments == null ||$this->InvoicePayments->first() == null ){
            return null;
        }
        return $this->InvoicePayments->first()->referencenumber;
    }
    public function Invoices(){
        return $this->belongsToMany('App\Invoice', 'InvoicePayments','payments_id','invoice_id' );
    }
   
    // public function AvailableBalance(){
    //     if($this->InvoicePayments == null || $this->InvoicePayments->first() == null){
    //         return null;
    //     }
    //     return $this->InvoicePayments()->orderBy('id', 'desc')->first()->PaymentAvailableBalance();
    // }
    public function AmountAppliedForInvoice($invoice_id){
        if($this->InvoicePayments == null || $this->InvoicePayments->first() == null){
            return null;
        }
        return $this->InvoicePayments->where('invoice_id', $invoice_id)->first()->paymentAmountForInvoice;
    }
    
    public function PaymentAvailableBalance(){
        if($this->amount == null || $this->Invoices == null){
            return 0;
        }
        $invoicePaymentAmountApplied = 0;
        foreach($this->InvoicePayments as $paymentsApplied){
            $invoicePaymentAmountApplied += $paymentsApplied->paymentAmountForInvoice;
        }
        return $this->amount - $invoicePaymentAmountApplied;
    }
}   
