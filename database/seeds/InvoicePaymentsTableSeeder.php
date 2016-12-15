<?php

use Illuminate\Database\Seeder;

class InvoicePaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('invoicepayments')->insert([
			[
			'id' => 1
			,'company_id' => 1
			,'date' => '2015-03-01'
			,'payments_id' => 1
			,'invoice_id' => 1
			,'referencenumber' => 'pm0001'
			,'paymentAmountForInvoice' => 26759.23
			]
			,
			[
			'id' => 2
			,'company_id' => 1
			,'date' => '2016-11-02'
			,'payments_id' => 2
			,'invoice_id' => 2
			,'referencenumber' => 'pm0002'
			,'paymentAmountForInvoice' => 400
			]
			,
			[
			'id' => 3
			,'company_id' => 1
			,'date' => '2016-11-03'
			,'payments_id' => 3
			,'invoice_id' => 2
			,'referencenumber' => 'pm0003'

			,'paymentAmountForInvoice' => 26359.23
			]
			,
			[
			'id' => 4
			,'company_id' => 1
			,'date' => '2016-10-7'
			,'payments_id' => 4
			,'invoice_id' => 3
			,'referencenumber' => 'pm0004'
			,'paymentAmountForInvoice' => 26759.23
			]
			,
			[
			'id' => 5
			,'company_id' => 1
			,'date' => '2016-10-7'
			,'payments_id' => 4
			,'invoice_id' => 4
			,'referencenumber' => 'pm0004'
			,'paymentAmountForInvoice' => 26759.23
			]
			,
			[
			'id' => 6
			,'company_id' => 1
			,'date' => '2016-10-7'
			,'payments_id' => 4
			,'invoice_id' => 5
			,'referencenumber' => 'pm0004'
			,'paymentAmountForInvoice' => 26759.23
			]
			
		]);
    }
}
