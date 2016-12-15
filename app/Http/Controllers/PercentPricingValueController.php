<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\PercentPricingValue;
use App\Http\Requests;
use App\Constants;
class PercentPricingValueController extends Controller
{
    public function getpercentpricing(){
        $wtaxpercent = PercentPricingValue::where('code', Constants::WTAX)->where('company_id', Auth::user()->company_id)->first();
        $vatpercent = PercentPricingValue::where('code', Constants::VATAX)->where('company_id', Auth::user()->company_id)->first();
        $penaltypercent = PercentPricingValue::where('code', Constants::PENALTY)->where('company_id', Auth::user()->company_id)->first();

        $data['wtax'] = $wtaxpercent;
        $data['vatax'] = $vatpercent;
        $data['penalty'] = $penaltypercent;
        $data['ModelURI'] = "percentpricing";
        $data['ModelIDnew'] = "getpercentpricing_new";
        $data['ModelIDdelete'] = "getpercentpricing_delete";
        $data['title'] = "Percent Items";
        $data['formViewPartial'] = "partials.percentpricingForm";
        $data['ModelURIlistview'] = "percentpricing/";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetpercentpricing";
		$data['create'] = "/percentpricing/";

        $data['canadd'] = false;
        $data['cansave'] = Auth::user()->cansave('percentpricing');
        $data['candelete'] = false;
        

        return view('formView4', $data);
    }
    
    public function postpercentpricing(Request $request = null){
        
        $wtaxpercent = PercentPricingValue::where('code',Constants::WTAX)->where('company_id', Auth::user()->company_id)->first();
        $wtaxpercent->percent = $request->wtax;
        $wtaxpercent->save();
        
        $vatpercent = PercentPricingValue::where('code', Constants::VATAX)->where('company_id', Auth::user()->company_id)->first();
        $vatpercent->percent = $request->vatax;
        $vatpercent->save();
        
        $penaltypercent = PercentPricingValue::where('code', Constants::PENALTY)->where('company_id', Auth::user()->company_id)->first();
        $penaltypercent->percent = $request->penalty;
        $penaltypercent->save();
        
        return redirect('/percentpricing/')->with('affirm',"System variables saved successfully");
    }
   
}
