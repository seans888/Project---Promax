<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class InvoiceDetails extends Model
{
    //
    protected $table = "invoicedetails";
    public $title = "Document Details";
    public function DocumentItem(){
    	return $this->belongsTo('App\DocumentItem','documentItem_code', 'code')->where('company_id', Auth::user()->company_id);
    }
    
    public function calculateWTax($taxableAmount){
    	$wtax = 0;
    	$pricingValue = PercentPricingValue::where('company_id', Auth::user()->company_id)->where('code', Constants::WTAX)->first();
    	$wtax = $taxableAmount * -1 * $pricingValue->percent;
    		//multiply to negative one so that it will be negative.
    	return $wtax;
    }
    public function calculateVATax($taxableAmount){
    	$VATAX = 0;
    	$pricingValue = PercentPricingValue::where('company_id', Auth::user()->company_id)->where('code', Constants::VATAX)->first();
    	$VATAX = $taxableAmount * $pricingValue->percent;
    	return $VATAX;
    }
    public function calculatePenalty($penalizableAmount){
    	$penalty = 0;
    	$pricingValue = PercentPricingValue::where('company_id', Auth::user()->company_id)->where('code', Constants::PENALTY)->first();
    	$penalty = $penalizableAmount * $pricingValue->percent;
    	return $penalty;
    }
}
