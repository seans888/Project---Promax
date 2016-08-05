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
			     	'enabled' => 1
			     	];
					

					$company1adminmanageusertype = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'usertypes',
			     	'enabled' => 1
			     	];

					$company1adminmanageusers = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'users',
			     	'enabled' => 1
			     	];
		     	//for reports
					$company1leasecontractReport = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'leasecontract',
			     	'enabled' => 1
			     	];
					$company1reservationcontractReport = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'reservationcontract',
			     	'enabled' => 1
			     	];
			    //for enter
			     	$company1branches = [
			     	'usertype_code' => 'admin',
			     	'company_id' => 1,
			     	'AccessLevel_code' => 'branches',
			     	'enabled' => 1
			     	];
					
    	$company1 = [
			$company1admincompany,
			$company1adminmanageusertype,
			$company1adminmanageusers,
			$company1leasecontractReport,
			$company1reservationcontractReport,
			$company1branches,
         ];
         DB::table('usertypeaccesslevel')->insert($company1);
    }
}
