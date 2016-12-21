<?php

use Illuminate\Database\Seeder;

class UserTypeAccessLevelTableSeeder extends Seeder
{
    public function run()
    {
        //for company 1
        	//for admin
	    		

		     	//for maintenance
					$company1admincompany = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'company',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1

			     	];
					

					$company1adminmanageusertype = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'usertypes',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];

					$company1adminmanageusers = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'users',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];

			     	$company1adminunittype = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'unittype',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
		     	//for reports
					$company1leasecontractReport = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'leasecontract',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1reservationcontractReport = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'reservationcontract',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1dss = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'dss',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
			    //for enter
			     	$company1branches = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'properties',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1enterreservationcontract = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'enterreservationcontract',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1enterunit = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'units',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1entertenant = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'tenant',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1enterinvoice = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'invoice',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1enterpayment = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'payment',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
					$company1DocumentDetail = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'documentitem',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];

					$company1PercentPricing = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'percentpricing',
			     	'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
			     	];
			     	
					
    	$company1 = [
			$company1admincompany,
			$company1adminmanageusertype,
			$company1adminmanageusers,
			$company1leasecontractReport,
			$company1reservationcontractReport,
			$company1branches,
			$company1enterreservationcontract,
			$company1adminunittype,
			$company1enterunit,
			$company1entertenant,
			$company1enterinvoice,
			$company1enterpayment,
			$company1DocumentDetail,
			$company1PercentPricing,
         ];
         DB::table('usertypeaccesslevel')->insert($company1);
    }
}
