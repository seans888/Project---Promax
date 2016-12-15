<?php

use Illuminate\Database\Seeder;
use App\Constants;
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
	            ,'id' => 1
	            ,'startdate' => '2015-01-01'
	            ,'enddate' => '2017-01-01'
	            ,'noOfDeposits' => 3
	            ,'noOfAdvance' => 1
	            ,'totalDepositAmt' => 510000
	            ,'unitBasicRent' => 26259.23
	            
	            ,'company_id' => 1
	           	,'tenants_id' => 1
	            ,'company_id' => 1
	            ,'property_id' => 1
	            ,'employersname' => 'John Michael'
	            ,'businessname' => 'LowPing Computershop'
	            ,'natureofbusiness' => 'computer rental'
	            ,'reservationfee' => 26259.23
	            ,'bankcheckno' => 'abcd1234'
	            ,'termoflease' => 'monthly'
	            ,'status' => 'Draft'
	            ,'taxAdjustment' => Constants::FORPROFIT
            ]
            ,
             [
	            
	            'unitnumber' => '1716b'
	            ,'id' => 2
	            ,'startdate' => '2015-01-01'
	            ,'enddate' => '2016-11-01'
	            ,'noOfDeposits' => 3
	            ,'noOfAdvance' => 1
	            ,'totalDepositAmt' => 510000
	            ,'unitBasicRent' => 26259.23
	            
	            ,'company_id' => 1
	           	,'tenants_id' => 1
	            ,'company_id' => 1
	            ,'property_id' => 1
	            ,'employersname' => 'Silvester Stallon'
	            ,'businessname' => 'SilverHiring Manpower Agency'
	            ,'natureofbusiness' => 'Service'
	            ,'reservationfee' => 26259.23
	            ,'bankcheckno' => 'abcd1234'
	            ,'termoflease' => 'monthly'
	            ,'status' => 'End of Contract'
	            ,'taxAdjustment' => Constants::FORPROFIT

            ]
            ,
            [
	            
	            'unitnumber' => '1716b'
	            ,'id' => 3
	            ,'startdate' => '2016-01-01'
	            ,'enddate' => '2019-01-01'
	            ,'noOfDeposits' => 3
	            ,'noOfAdvance' => 1
	            ,'totalDepositAmt' => 510000
	            ,'unitBasicRent' => 26259.23
	            
	            ,'company_id' => 1
	           	,'tenants_id' => 2
	            ,'company_id' => 1
	            ,'property_id' => 1
	            ,'employersname' => 'dexter salon'
	            ,'businessname' => 'Dual Dexterity Salon'
	            ,'natureofbusiness' => 'Service'
	            ,'reservationfee' => 26259.23
	            ,'bankcheckno' => 'abcd1234'
	            ,'termoflease' => 'monthly'
	            ,'status' => 'Active'
	            ,'taxAdjustment' => Constants::FORPROFIT

            ]
        ]);
    }
}
