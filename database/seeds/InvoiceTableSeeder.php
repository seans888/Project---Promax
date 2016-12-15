<?php

use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('invoice')->insert([
			[
			'id' => 1
			,'company_id' => 1
			,'date' => '2015-03-1'
			,'billingPeriodStart' => '2015-02-01'
			,'billingPeriodEnd' => '2015-2-30'
			,'duedate' => '2016-03-15'
			,'reservationcontract_id' => 2
			,'status' => 'Paid'
			,'issuedBy' => 'John Doe'
			,'payer_id' => 1
			]
			,
			[
			'id' => 2
			,'company_id' => 1
			,'date' => '2016-11-1'
			,'billingPeriodStart' => '2016-10-01'
			,'billingPeriodEnd' => '2016-10-30'
			,'duedate' => '2016-11-15'
			,'reservationcontract_id' => 2
			,'status' => 'Paid'
			,'issuedBy' => 'John Mark'
			,'payer_id' => 1
			]
			,
			[
			'id' => 3
			,'company_id' => 1
			,'date' => '2015-11-5'
			,'billingPeriodStart' => '2016-10-01'
			,'billingPeriodEnd' => '2016-10-30'
			,'duedate' => '2016-11-15'
			,'reservationcontract_id' => 2
			,'status' => 'Paid'
			,'issuedBy' => 'AR Talag'
			,'payer_id' => 1
			],
			[
			'id' => 4
			,'company_id' => 1
			,'date' => '2016-9-1'
			,'billingPeriodStart' => '2016-08-01'
			,'billingPeriodEnd' => '2016-08-30'
			,'duedate' => '2016-09-15'
			,'reservationcontract_id' => 3
			,'status' => 'Paid'
			,'issuedBy' => 'AR Talag'
			,'payer_id' => 2
			],
			[
			'id' => 5
			,'company_id' => 1
			,'date' => '2016-10-1'
			,'billingPeriodStart' => '2016-09-01'
			,'billingPeriodEnd' => '2016-09-30'
			,'duedate' => '2016-10-15'
			,'reservationcontract_id' => 3
			,'status' => 'Paid'
			,'issuedBy' => 'AR Talag'
			,'payer_id' => 2
			]
			

		]);
    }
}
