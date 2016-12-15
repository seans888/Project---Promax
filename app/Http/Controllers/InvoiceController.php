<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Invoice;
use Auth;
use App\ReservationContract;
use App\Tenants;
use App\Payments;
use App\InvoicePayments;
use App\InvoiceDetails;
use App\DocumentItem;
use App\Constants;
class InvoiceController extends Controller
{
    public function invoicelist(){
        $data['title'] = "invoice";
        $data['header'] = "List of invoice";
        $data['Model'] = Invoice::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.invoiceTable";
        $data['canAdd'] = Auth::user()->canAdd('invoice');
        $data['create'] = "/invoice/new";

        return view('listview', $data);
    }
    public function deleteinvoicedetail($id){
        $invoicedetail = InvoiceDetails::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $invoicedetail->delete();
        return;
    }
    public function saveinvoicedetail(Request $request, $id){
        $invoicedetail = new InvoiceDetails();
        $invoicedetail->company_id = Auth::user()->company_id;
        $invoicedetail->documentItem_code = $request->docid;
        $invoicedetail->note = $request->docdesc;
        $invoicedetail->amount = $request->docamount;
        $invoicedetail->invoice_id = $id;
        $invoicedetail->save();
        return redirect('/invoice/get/' . $id);
    }
    
    public function getinvoice($id){
    	 $invoice = Invoice::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        if($invoice == null){
            return redirect('/invoice/list/');
        }
        $data['Model'] = $invoice;
        $data['ModelURI'] = "invoice";
        $data['ModelIDnew'] = "getinvoice_new";
        $data['ModelIDdelete'] = "getinvoice_delete";
        $data['title'] = "Invoice";
        $data['formViewPartial'] = "partials.invoiceForm";
        $data['ModelURIlistview'] = "invoice/list";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formGetinvoice";
		$data['create'] = "/invoice/new";

        $data['canadd'] = Auth::user()->canAdd('invoice');
        $data['cansave'] = Auth::user()->cansave('invoice');
        $data['candelete'] = Auth::user()->candelete('invoice');

        $data['contracts'] = ReservationContract::where('company_id', Auth::user()->company_id)->where('status', 'Active')->get();
        if($invoice->status != null && $invoice->status != Constants::DRAFT){
            $data['cansave'] = false;
            $data['candelete'] = false;
                
        }
        $data['documentItems'] = DocumentItem::where('company_id', Auth::user()->company_id)->get();
        $data['payers'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['invoice'] = Invoice::where('company_id', Auth::user()->company_id)->get();
        
        $actions = [];
        if($data['cansave'] == true){
            if($invoice->status != null && $invoice->status == Constants::DRAFT && $invoice->Balance() > 0 && $invoice->billingPeriodStart != null && $invoice->billingPeriodEnd != null){
                array_push($actions, '<button type="button" class="btn btn-default" id="getInvoice_release">Print Statement</button');
            }
        }
        $data['actions'] = $actions;
        return view('formView3', $data);

    }
     public function newinvoice(Request $request){
    	 $invoice = new Invoice();
        
        $data['Model'] = $invoice;
        $data['ModelURI'] = "invoice";
        $data['ModelIDnew'] = "getinvoice_new";
        $data['ModelIDdelete'] = "getinvoice_delete";
        $data['title'] = "Invoice";
        $data['formViewPartial'] = "partials.invoiceForm";
        $data['ModelURIlistview'] = "invoice/list";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formgetinvoice";
		$data['create'] = "/invoice/new";


        $data['canadd'] = Auth::user()->canAdd('invoice');
        $data['cansave'] = Auth::user()->cansave('invoice');
        $data['candelete'] = Auth::user()->candelete('invoice');
        if($invoice->status != null && $invoice->status != Constants::DRAFT){
            $data['cansave'] = false;
            $data['candelete'] = false;
                
        }
       
        $data['documentItems'] = DocumentItem::where('company_id', Auth::user()->company_id)->get();
        $data['contracts'] = ReservationContract::where('company_id', Auth::user()->company_id)->where('status', 'Active')->get();
        if(Auth::user()->canAdd('invoice') == false || Auth::user()->canAdd('invoice') == 0){
            return $this->invoicelist();
        }
        $data['Model'] = $invoice;
        $data['payers'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['invoice'] = Invoice::where('company_id', Auth::user()->company_id)->get();

		return view('formView2', $data);
    }
    public function postinvoice(Request $request = null, $id = null){
        
        $invoice = new Invoice();
        $affirmationMessage = "Invoice created successfully!";
        if($request->has('id') && $request->id != null){
            $invoice = Invoice::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
            if($invoice){
                
                $affirmationMessage = "Invoice updated successfully!";
            } else{
                //putting new user code results in "add" function
                $invoice = new Invoice();
                $affirmationMessage = "Invoice created successfully!";
            }
        }
       $invoice->company_id = Auth::user()->company_id;
        $invoice->status = $request->status;
        $invoice->date = $request->date;
        if($request->reservationcontract_id){
            $invoice->reservationcontract_id = $request->reservationcontract_id;
            $contract = ReservationContract::where('id', $request->reservationcontract_id)->where('company_id', Auth::user()->company_id)->first();
        }
        $invoice->billingPeriodStart = $request->billingPeriodStart;
        $invoice->billingPeriodEnd = $request->billingPeriodEnd;
        $invoice->duedate = $request->duedate;
        $invoice->issuedBy = $request->issuedBy;
        $invoice->desc = $request->desc;
        $invoice->payer_id = $request->payer;
        $invoice->save();
        

        //update latestDueDate of the contract
        if($invoice->reservationcontract_id){
            $contract = ReservationContract::where('id', $invoice->reservationcontract_id)->where('company_id', Auth::user()->company_id)->first();
            $latestInvoice = $contract->Invoices()->orderBy('duedate','desc')->first();
            if($latestInvoice->id == $invoice->id){
                $contract->latestBillingDueDate = $invoice->duedate;
                $contract->save();
            }
        }

        return redirect('/invoice/get/' . $invoice->id)->with('affirm', $affirmationMessage);
    }
    public function releaseinvoice(Request $request = null, $id = null){
        $invoice = Invoice::where('id', $request->id)->where('company_id', Auth::user()->company_id)->first();
        
        if($invoice->status == Constants::DRAFT){
            $invoice->status = Constants::INVOICE_UNPAID;
        }
        if($invoice->Balance() > 0){
            $invoice->status = Constants::INVOICE_UNPAID;
        }
        if($invoice->Balance() == 0){
            $invoice->status = Constants::INVOICE_PAID;
        }
        $invoice->save();
        return $invoice;
    }
    public function deleteinvoice(Request $request, $id){
        $invoice = Invoice::where('id', $id)->where('company_id', Auth::user()->company_id)->first();
        $invoice->delete();
        $affirmationMessage = "Invoice deleted successfully!";
        return redirect('/invoice/list/')->with('affirm', $affirmationMessage);
    }
    public function GetPayerByContract($id){
        $contract = ReservationContract::where("company_id", Auth::user()->company_id)->where('id', $id)->first();
        if($contract){
            return $contract->tenants_id;
        }else{
            return null;
        }
    }
}
