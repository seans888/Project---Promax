<?php

use Illuminate\Database\Seeder;
use App\Constants;
class InvoiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('invoicedetails')->insert([
			[
			'id' => 1
			,'company_id' => 1
            ,'documentItem_code' => Constants::LEASEBILL
			,'note' => 'Monthly Billing'
			,'amount' => 26259.23
			,'invoice_id' => 1
			
			]
            ,
            [
            'id' => 2
            ,'company_id' => 1
            ,'documentItem_code' =>Constants::WATERBILL
            ,'note' => 'Maynilad Billing'
            ,'amount' => 500
            ,'invoice_id' => 1
            
            ]
            ,
            [
            'id' =>3
            ,'company_id' => 1
            ,'documentItem_code' => Constants::LEASEBILL
            ,'note' => 'Monthly Billing'
            ,'amount' => 26259.230
            ,'invoice_id' => 2
            ] 
            ,
            [
            'id' => 4
            ,'company_id' => 1
            ,'documentItem_code' => Constants::WATERBILL
            ,'note' => 'Maynilad Billing'
            ,'amount' => 500
            ,'invoice_id' => 2
            
            ]
            ,
            [
            'id' =>5
            ,'company_id' => 1
            ,'documentItem_code' => Constants::LEASEBILL
            ,'note' => 'Monthly Billing'
            ,'amount' => 26259.230
            ,'invoice_id' => 3
            ] 
            ,
            [
            'id' => 6
            ,'company_id' => 1
            ,'documentItem_code' => Constants::WATERBILL
            ,'note' => 'Maynilad Billing'
            ,'amount' => 500
            ,'invoice_id' => 3
            
            ]
            ,
            [
            'id' => 7
            ,'company_id' => 1
            ,'documentItem_code' => Constants::LEASEBILL
            ,'note' => 'Monthly Billing'
            ,'amount' => 26259.230
            ,'invoice_id' => 4
            ]
            ,
            [
            'id' => 8
            ,'company_id' => 1
            ,'documentItem_code' => Constants::WATERBILL
            ,'note' => 'Maynilad Billing'
            ,'amount' => 500
            ,'invoice_id' => 4
            
            ]
            ,
            [
            'id' => 9
            ,'company_id' => 1
            ,'documentItem_code' => Constants::LEASEBILL
            ,'note' => 'Monthly Billing'
            ,'amount' => 26259.230
            ,'invoice_id' => 5
            ]
            ,
            [
            'id' => 10
            ,'company_id' => 1
            ,'documentItem_code' => Constants::WATERBILL
            ,'note' => 'Maynilad Billing'
            ,'amount' => 500
            ,'invoice_id' => 5
            
            ]
           
		]);
    }
}
