<?php

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tenants')->insert([

            [
	            
	            'unittype' => '2BR'
	            ,'unitnumber' => '1717'
	            ,'startdate' => '2015-06-17'
	            ,'noOfDeposits' => 11
	            ,'noOfAdvance' => 6
	            ,'totalDepositAmt' => 510000
	            ,'unitBasicRent' => 30000
	            ,'vat' => 0.12
	            ,'whtax' => 0.12
	            ,'lgwhtax' => 0.12
	            ,'unittotalrent' => 540000
	            ,'company_id' => 1
	            ,'branch_id' => 1
	           	,'tenantname' => 'Aurelio Rolando Talag'
	            ,'company_id' => 1
            ]
        ]);
    }
}
