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
use App\Invoice;
use App\Constants;
use App\InvoiceDetails;
use DateTime;
use DateInterval;
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
    public function add_months($months, DateTime $dateObject) 
    {
        $next = new DateTime($dateObject->format('Y-m-d'));
        $next->modify('last day of +'.$months.' month');

        if($dateObject->format('d') > $next->format('d')) {
            return $dateObject->diff($next);
        } else {
            return new DateInterval('P'.$months.'M');
        }
    }

    public function endCycle($d1, $months)
    {
        $date = new DateTime($d1);

        // call second function to add the months
        $newDate = $date->add($this->add_months($months, $date));

        // goes back 1 day from date, remove if you want same day of month
        $newDate->sub(new DateInterval('P1D')); 

        //formats final date to Y-m-d form
        $dateReturned = $newDate->format('Y-m-d'); 

        return $dateReturned;
    }
    public function generateinvoice($contract_id){

        $invoice = new Invoice();
        $invoice->company_id = Auth::user()->company_id;
        $invoice->status = Constants::DRAFT;
        $invoice->reservationcontract_id = $contract_id;
        $contract = ReservationContract::where('id', $contract_id)->where('company_id', Auth::user()->company_id)->first();
        $latestBill = $contract->LatestBillingDate();
        $startDate = date("Y-m-d");
        if($latestBill != null){
            $startDate = new DateTime($latestBill);
            $startDate->modify('+1 month');
        } else{
            $startDate = new DateTime($contract->startdate);
        }


            $endDate = $this->endCycle($startDate->format('Y-m-d'), 1);
            $invoice->billingPeriodStart = $startDate;
            $invoice->billingPeriodEnd = $endDate;
            $invoice->date = $startDate;
            $invoice->duedate = $endDate;
        if($contract->status = "Active"){
            $latestBilling = $contract->LatestDueDate();
            $previousinvoice = $contract->LatestInvoice();
            $invoice->payer_id = $contract->tenants_id;
            $invoice->date = $startDate;
            $invoice->issuedBy = Auth::user()->name;
            $invoice->save();
             //add penalty if beyond due date
            if( ($invoice->date > $latestBilling) && ($contract->Balance() > 0)){
                $unpaidBalance = $contract->Balance();

                $Penalty = new InvoiceDetails();
                $Penalty->invoice_id = $invoice->id;
                $Penalty->documentItem_code = Constants::PENALTY;
                $Penalty->note = "";
                $Penalty->amount = $Penalty->calculatePenalty($contract->Balance());
                $Penalty->company_id= $invoice->company_id;
                $Penalty->save();


                $previousInvoiceUnpaid = new InvoiceDetails();
                $previousInvoiceUnpaid->invoice_id = $invoice->id;
                $previousInvoiceUnpaid->documentItem_code = Constants::PREVIOUSINVOICEUNPAIDBALANCE;
                $previousInvoiceUnpaid->amount = $unpaidBalance;
                $previousInvoiceUnpaid->company_id = $invoice->company_id;
                $previousInvoiceUnpaid->save();

                //adjust previous invoice so that balance will be 0
                $transferred = new InvoiceDetails();
                $transferred->invoice_id = $previousinvoice->id;
                $transferred->documentItem_code = Constants::TRANSFERRED;
                $transferred->note = "";
                $transferred->amount = $unpaidBalance * -1;
                $transferred->company_id= $invoice->company_id;
                $transferred->save();

                $previousinvoice->status = Constants::TRANSFERRED;
                $previousinvoice->save();
            }
            
            $LeaseBill = new InvoiceDetails();
            //insert monthly billing, wtax, and vat
            $LeaseBill->documentItem_code = Constants::LEASEBILL;
            $LeaseBill->invoice_id = $invoice->id;
            $LeaseBill->amount = $contract->unitBasicRent;
            $LeaseBill->company_id= $invoice->company_id;
            $LeaseBill->save();
            if($contract->taxAdjustment == Constants::FORPROFIT){
                $WTax = new InvoiceDetails();
                $WTax->documentItem_code = Constants::WTAX;
                $WTax->invoice_id = $invoice->id;
                $WTax->amount = $WTax->calculateWTax($invoice->wtaxableAmount());
                $WTax->company_id= $invoice->company_id;
                $WTax->save();

                $VATax = new InvoiceDetails();
                $VATax->invoice_id = $invoice->id;
                $VATax->documentItem_code = Constants::VATAX;
                $VATax->amount = $VATax->calculateVATax($invoice->vataxableAmount());
                $VATax->company_id= $invoice->company_id;
                $VATax->save();
            }
           

            return redirect('/invoice/get/' . $invoice->id)->with('info', "Invoice Generated, Please supply necessary details and then save");
        } else {
            return redirect('/reservationcontract/get/' . $contract_id)->with('error', 'Reservation Contract is Expired. Cannot apply invoice with date beyond end of contract date');
        }
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
        if($contract->status != null && $contract->status != "Draft"){
            $data['candelete'] = false;
                
        }
        if($contract->status == "Active" && $contract->haveInvoices() == false){
            $data['cansave'] = true;
        }
        $data['tenants'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['properties'] = Property::where('company_id', Auth::user()->company_id)->get();
        $data['units'] = Unit::where('company_id', Auth::user()->company_id)->get();

        $actions = [];
        
        if($contract->status != null && $contract->status == "Active" && Auth::user()->canAdd('invoice') == true && !$contract->isExpired()){
            array_push($actions, '<a href="/reservationcontract/generateinvoice/' . $contract->id . '" class="btn btn-default" id="getReservationContract_generateInvoice">Generate Invoice</a>');
        }
        if($contract->isExpired() && $contract->status != "End of Contract"){
            $contract->status = "End of Contract";
            $contract->save();
        }
        $data['actions'] = $actions;
        return view('formView3', $data);
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
        if($contract->status != null && $contract->status != "Draft"){
            $data['cansave'] = false;
            $data['candelete'] = false;
                
        }
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
        $contract->status = $request->status;
        $contract->taxAdjustment = $request->taxAdjustment;
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
