<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Notifications;
use Auth;
use App\Strings;
use App\Company;
use Illuminate\Http\Response;
use Hash;
use App\Branch;
use App\Employee;
use App\Tenants;
class TenantController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');

    }
    public function deletetenant($id){

    	$tenant = Tenants::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
    	$branchId = $tenant->branch_id;
    	$tenant->delete();
    	return redirect("/project/" . $branchId)->with('affirm2', 'Tenant deleted successfully!');
    }
    public function posttenant(Request $request = null, $id){
    	 $this->validate($request, [
            'unittype' => 'required'
            ,'unitnumber' => 'required'
            ,'startdate' =>'required'
            ,'tenantname' => 'required'
            
        ]);
    	if($request->has('tenant_id') == false){
	    	$Tenant = new Tenants();
	    	$affirmationMessage = "Tenant created successfully!";
		}
		else{
			$Tenant = Tenants::where('id', $request->tenant_id)->where('company_id', Auth::user()->company_id)->first();
	    	$affirmationMessage = "Tenant updated successfully!";
		}
        $Tenant->unittype = $request->unittype;
        $Tenant->tenantname = $request->tenantname;
        $Tenant->unitnumber = $request->unitnumber;
        $Tenant->startdate = $request->startdate;
        $Tenant->enddate = $request->enddate;
		$Tenant->noOfDeposits = $request->noOfDeposits;
		$Tenant->noOfAdvance = $request->noOfAdvance;
		$Tenant->totalDepositAmt = $request->totalDepositAmt;
		$Tenant->unitBasicRent = $request->unitBasicRent;
		$Tenant->vat = $request->vat;
		$Tenant->whtax = $request->whtax;
		$Tenant->lgwhtax = $request->lgwhtax;
		$Tenant->unittotalrent = $request->unittotalrent;
		$Tenant->unittotalrent = $request->unittotalrent;
        
        $Tenant->branch_id = $id;
        $Tenant->company_id = Auth::user()->company_id;
        
        $Tenant->save();
        return redirect('/project/' . $Tenant->branch_id)->with('affirm2', $affirmationMessage);
    }
}
