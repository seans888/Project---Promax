<?php
namespace App;

class Constants
{
	//invoice details
	    const LEASEBILL = "Monthly Rental";
	    const WATERBILL = "Water Bill";
	    const PENALTY = "Penalty";
	    const WTAX = "W/H Tax";
	    const VATAX = "VAT";
	    const PREVIOUSINVOICEUNPAIDBALANCE = "Previous Invoice Unpaid Balance";
		const TRANSFERRED = "Transferred to next invoice"; //also for invoice status

    //invoice status
	    const INVOICE_PAID = "Paid";
	    const INVOICE_UNPAID = "Unpaid";
	    const DRAFT = "Draft"; //also for payment
    //payment status
	    const PAYMENTPOSTED = "Payment posted";
	//choices for taxAdjustment
    	const FORPROFIT = "Private (taxable)";
    	const NONPROFIT = "Non-profit (non-taxable)";
}