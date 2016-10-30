<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\ReservationContract;
use App\User;
use App\Property;
use App\Unit;
use App\Tenants;
class ReservationContractController extends Controller
{

     public function ReservationContractList(){
        $data['title'] = "Reservation Contracts";
        $data['header'] = "List of Reservation Contracts";
        $data['Model'] = ReservationContract::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.ReservationContractTable";

        $data['canAdd'] = Auth::user()->canAdd('enterreservationcontract');
        $data['create'] = "/reservationcontract/new";

        return view('listview', $data);
    }
    public function getReservationContract($id){
    	 $contract = ReservationContract::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($contract == null){
            return redirect('/reservationcontract/list/');
        }
        $data['Model'] = $contract;
        $data['ModelURI'] = "ReservationContract";
        $data['ModelIDnew'] = "getreservationcontract_new";
        $data['ModelIDdelete'] = "getreservationcontract_delete2";
        $data['title'] = "Reservation Contract";
        $data['formViewPartial'] = "partials.reservationContractForm";
        $data['ModelURIlistview'] = "reservationcontract/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetReservationContract";
		$data['create'] = "/reservationcontract/new";

        $data['canadd'] = Auth::user()->canAdd('enterreservationcontract');
        $data['cansave'] = Auth::user()->cansave('enterreservationcontract');
        $data['candelete'] = Auth::user()->candelete('enterreservationcontract');

        $data['tenants'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
     public function newReservationContract(Request $request){
    	 $contract = new ReservationContract();
        
        $data['ModelURI'] = "ReservationContract";
        $data['ModelIDnew'] = "getreservationcontract_new";
        $data['ModelIDdelete'] = "getreservationcontract_delete2";
        $data['title'] = "Reservation Contract";
        $data['formViewPartial'] = "partials.reservationContractForm";
        $data['ModelURIlistview'] = "reservationcontract/list";
        $company_id = auth::user()->company_id;
        $data['formID'] = "formGetReservationContract";
		$data['create'] = "/reservationcontract/new";


        $data['tenants'] = Tenants::where('company_id', Auth::user()->company_id)->get();

        $data['canadd'] = Auth::user()->canAdd('enterreservationcontract');
        $data['cansave'] = Auth::user()->cansave('enterreservationcontract');
        $data['candelete'] = Auth::user()->candelete('enterreservationcontract');

        $data['Model'] = $contract;
		$data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();

        $data['units'] = Unit::where('company_id' , Auth::user()->company_id)->get();
        return view('formView2', $data);
    }
    public function postReservationContract(Request $request = null, $id = null){
        
        $contract = new ReservationContract();
        $affirmationMessage = "Reservation Contract created successfully!";
        if($request->has('id') && $request->id != null){
            $contract = ReservationContract::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
            if($contract){
                
                $affirmationMessage = "Reservation Contract updated successfully!";
            } else{
                //putting new user code results in "add" function
                
                $affirmationMessage = "user created successfully!";
            }
        }
        $contract->unitnumber = $request->unitnumber;
        $contract->startdate = $request->startdate;
        $contract->enddate = $request->enddate;
        $contract->noOfDeposits = $request->noOfDeposits;
        $contract->noOfAdvance = $request->noOfAdvance;
        $contract->unitBasicRent = $request->unitBasicRent;
        $contract->company_id =Auth::user()->company_id;
        $contract->tenants_id = $request->tenant;
        $contract->property_id = $request->property;
        $contract->employersname = $request->employersname;
        $contract->businessname = $request->businessname;
        $contract->natureofbusiness = $request->natureofbusiness;
        $contract->reservationfee = $request->reservationfee;
        $contract->bankcheckno = $request->bankcheckno;

        $contract->save();
        
        return redirect('/reservationcontract/get/' . $contract->id)->with('affirm', $affirmationMessage);
    }
    public function deleteReservationContract(Request $request, $id){
        $contract = ReservationContract::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $contract->delete();
        $affirmationMessage = "Reservation Contract deleted successfully!";
        return redirect('/property/get/' . $request->parent_id)->with('affirm2', $affirmationMessage);
    }
    public function deleteReservationContract2(Request $request, $id){
        $contract = ReservationContract::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $contract->delete();
        $affirmationMessage = "Reservation Contract deleted successfully!";
        return redirect('/reservationcontract/list/')->with('affirm2', $affirmationMessage);
    }
}
