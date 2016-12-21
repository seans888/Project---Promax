<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Payments;
use Auth;
use App\ReservationContract;
use App\Tenants;
use App\Invoice;
use App\InvoicePayments;
use App\Constants;
class PaymentController extends Controller
{
    //
    public function paymentlist(){
        $data['title'] = "payment";
        $data['header'] = "List of payment";
        $data['Model'] = Payments::where('company_id', Auth::user()->company_id)->get();
        $data['tablePartialView'] = "partials.paymentTable";
        $data['canAdd'] = Auth::user()->canAdd('payment');
        $data['create'] = "/payment/new";

        return view('listview', $data);
    }
    public function getpayment($id){
        $invoicepayment = InvoicePayments::where('referencenumber', $id)->where('company_id', Auth::user()->company_id)->first();
        if($invoicepayment == null){
            return redirect('/payment/list/');
        }
    	$payment = Payments::where('id', $invoicepayment->payments_id)->where('company_id', Auth::user()->company_id)->first();
        
        $data['Model'] = $payment;
        $data['ModelURI'] = "payment";
        $data['ModelIDnew'] = "getpayment_new";
        $data['ModelIDdelete'] = "getpayment_delete";
        $data['title'] = "payment";
        $data['formViewPartial'] = "partials.paymentForm";
        $data['ModelURIlistview'] = "payment/list";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formGetpayment";
		$data['create'] = "/payment/new";

        $data['canadd'] = Auth::user()->canAdd('payment');
        $data['cansave'] = Auth::user()->cansave('payment');
        $data['candelete'] = Auth::user()->candelete('payment');

        $data['invoices'] = Invoice::where('company_id', Auth::user()->company_id)->where('status', Constants::INVOICE_UNPAID)->whereNotIn('id', $payment->Invoices->lists('id')->toArray())->get();
        if($payment->status != null && $payment->status != Constants::DRAFT){
            $data['cansave'] = false;
            $data['candelete'] = false;
                
        }

        $data['payers'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['payment'] = Payments::where('company_id', Auth::user()->company_id)->get();
        
        $actions = [];
        if($data['cansave'] == true){
            if($payment->status != null && $payment->status == Constants::DRAFT){
                array_push($actions, '<button type="button" class="btn btn-default" id="getPayment_release">Post payment</button');
            }
        }
        $data['actions'] = $actions;
        return view('formView3', $data);

    }
     public function newpayment(Request $request){
    	 $payment = new Payments();
        $payment->date = date("Y-m-d");
        $data['Model'] = $payment;
        $data['ModelURI'] = "payment";
        $data['ModelIDnew'] = "getpayment_new";
        $data['ModelIDdelete'] = "getpayment_delete";
        $data['title'] = "payment";
        $data['formViewPartial'] = "partials.paymentForm";
        $data['ModelURIlistview'] = "payment/list";
        $company_id = Auth::user()->company_id;
        $data['formID'] = "formgetpayment";
		$data['create'] = "/payment/new";


        $data['canadd'] = Auth::user()->canAdd('payment');
        $data['cansave'] = Auth::user()->cansave('payment');
        $data['candelete'] = Auth::user()->candelete('payment');
        if($payment->status != null && $payment->status != Constants::DRAFT){
            $data['cansave'] = false;
            $data['candelete'] = false;
                
        }
       
        $data['invoices'] = Invoice::where('company_id', Auth::user()->company_id)->where('status', Constants::INVOICE_UNPAID)->get();
        if(Auth::user()->canAdd('payment') == false || Auth::user()->canAdd('payment') == 0){
            return $this->paymentlist();
        }
        $data['Model'] = $payment;
        $data['payers'] = Tenants::where('company_id', Auth::user()->company_id)->get();
        $data['payment'] = Payments::where('company_id', Auth::user()->company_id)->get();

		return view('formView2', $data);
    }
    public function generatepayment(Request $request, $invoice_id){
        $invoice = Invoice::where('id', $invoice_id)->where('company_id', Auth::user()->company_id)->first();
        $payment = new Payments();
        $invoicepayment = new InvoicePayments();
        $affirmationMessage = "Payment created successfully!";
        //check if payment already exist
        
        //can save or update payment if new or on hold
        $payment->status = Constants::DRAFT;
        $payment->company_id = Auth::user()->company_id;
        $payment->date = date("Y-m-d");
        $payment->desc = "";
        $payment->amount = $request->amountpaid;
        $payment->save();
    
        
        $invoicepayment->company_id = Auth::user()->company_id;
        if($request->referencenumber == ""){
            $referencenumber = "PM" . str_pad($payment->id, 5, "0", STR_PAD_LEFT);
        } else{
            $referencenumber = $request->referencenumber;
        }
        $invoicepayment->referencenumber =$referencenumber;
        $invoicepayment->paymentAmountForInvoice = $payment->amount;
        $invoicepayment->date = $payment->date;
        $invoicepayment->invoice_id = $invoice_id;
        $invoicepayment->payments_id = $payment->id;
        $invoicepayment->save();
       
        return redirect('/payment/get/' . $invoicepayment->referencenumber)->with('affirm', $affirmationMessage);
    }
    public function postpayment(Request $request = null, $id = null){
        
        $payment = new Payments();
        $invoicepayment = new InvoicePayments();
        $affirmationMessage = "Payment created successfully!";
        //check if payment already exist
        if($id != null){
            $payment = InvoicePayments::where('referencenumber', $id)->where('company_id', Auth::user()->company_id)->first()->Payment;
            if($payment != null){
                $payment = InvoicePayments::where('referencenumber', $id)->where('company_id', Auth::user()->company_id)->first()->Payment;
                $affirmationMessage = "Payment updated successfully";
                $invoicepayment->referencenumber = $payment->ReferenceNumber();
            } else{
                $payment = new Payments();
            }
        }
        //can save or update payment if new or on hold
        if($payment->status == null || $payment->status == Constants::DRAFT){
            $payment->company_id = Auth::user()->company_id;
            $payment->status = $request->status;
            $payment->date = $request->date;
            $payment->desc = $request->desc;
            $payment->amount = $request->amount;

            $payment->save();
        }
        if($request->has('paymentAmountForInvoice')){
            $invoicepayment->company_id = Auth::user()->company_id;
             if($request->referencenumber == "" || $request->referencenumber == null){
                $invoicepayment->referencenumber = "PM" . str_pad($payment->id, 5, "0", STR_PAD_LEFT);
            } else{
                $invoicepayment->referencenumber = $request->referencenumber;
            }
            $invoicepayment->paymentAmountForInvoice = $request->paymentAmountForInvoice;
            $invoicepayment->date = $request->date;
            $invoicepayment->invoice_id = $request->applyinvoice;
            $invoicepayment->payments_id = $payment->id;
            $invoicepayment->save();
            }
        return redirect('/payment/get/' . $invoicepayment->referencenumber)->with('affirm', $affirmationMessage);
    }
    public function releasepayment(Request $request = null, $id = null){
        $invoicepayment = InvoicePayments::where('referencenumber', $id)->where('company_id', Auth::user()->company_id)->first();
        if($invoicepayment == null){
            return redirect('/payment/list/');
        }
        $payments = $invoicepayment->Payments;
        foreach($payments as $payment){
            if($payment->status == Constants::DRAFT){
                if($invoicepayment->PaymentAvailableBalance() > 0){
                    $payment->status = Constants::PAYMENTPOSTED;
                } else{
                    $payment->status = Constants::PAYMENTPOSTED;
                }
            }
            $payment->save();
            $invoices = $payment->Invoices;
            foreach($invoices as $invoice){
                if($invoice->Balance() == 0 && $invoice->status == Constants::INVOICE_UNPAID){
                    $invoice->status = Constants::INVOICE_PAID;
                    $invoice->save();
                }
            }
            
        }

        
        return $payment;
    }
    public function deletepaymentdetail(Request $request, $id){
        $invoicePayment = InvoicePayments::where('id', $id)->where('company_id', Auth::user()->id)->first();
        if(InvoicePayments::where('referencenumber', $invoicePayment->referencenumber)->where('company_id', Auth::user()->id)->count() == 1){
            $payment = $invoicePayment->Payment;
            $payment->delete();
            return;
        }

        $invoicePayment->delete();
        return;
    }
    public function deletepayment(Request $request, $id){
        $invoicePayments = InvoicePayments::where('referencenumber', $id)->where('company_id', Auth::user()->id)->first();
        $payment = Payments::where('id', $invoicePayments->Payment->id)->where('company_id', Auth::user()->company_id)->first();
        $payment->delete();
        $affirmationMessage = "payment deleted successfully!";
        return redirect('/payment/list/')->with('affirm', $affirmationMessage);
    }
}
