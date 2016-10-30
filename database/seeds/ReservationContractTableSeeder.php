<?php

use Illuminate\Database\Seeder;

class ReservationContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reservationcontract')->insert([
            
            [
	            
	            'unitnumber' => '1717A'
	            ,'startdate' => '2015-06-17'
	            ,'noOfDeposits' => 11
	            ,'noOfAdvance' => 6
	            ,'totalDepositAmt' => 510000
	            ,'unitBasicRent' => 30000
	            
	            ,'company_id' => 1
	           	,'tenants_id' => 1
	            ,'company_id' => 1
	            ,'property_id' => 1
	            ,'employersname' => 'John Michael'
	            ,'businessname' => 'LowPing Computershop'
	            ,'natureofbusiness' => 'computer rental'
	            ,'reservationfee' => 10000
	            ,'bankcheckno' => 'abcd1234'
	            ,'termoflease' => 'monthly'

            ]
        ]);
    }
}
