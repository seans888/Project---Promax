<?php

use Illuminate\Database\Seeder;

class AccessLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        

	     	//for maintenance
	   	        $company1company = [
		     		
		     	'code' => 'company',
		     	'company_id' => 1,
		     	'process' => 'maintenance',
		     	'uri' => '/company',
		     	'uifieldname' => 'Company/Branches',
		     	'icon' => 'fa-hospital-o'
		     	];

				
				$company1manageUserTypes = [
		     	'code' => 'usertypes',
		     	'company_id' => 1,
		     	'process' => 'maintenance',
		     	'uifieldname' => 'UserTypes',
		     	'uri' => '/usertypes',
		     	'icon' => 'fa-sitemap'
		     	];

				$company1manageusers = [
		     	'code' => 'users',
		     	'company_id' => 1,
		     	'process' => 'maintenance',
		     	'uifieldname' => 'Users',
		     	'uri' => '/users',
		     	'icon' => 'fa-user-plus'
		     	];
   	//reports
			$company1leasecontract = [
	     	'code' => 'leasecontract',
	     	'company_id' => 1,
	     	'process' => 'reports',
	     	'uifieldname' => 'Lease Contract',
	     	'uri' => '/leasecontract.pdf',
	     	'icon' => 'fa-file-pdf-o'
	     	];

			$company1reservationcontract = [
	     	'code' => 'reservationcontract',
	     	'company_id' => 1,
	     	'process' => 'reports',
	     	'uifieldname' => 'Reservation Contract',
	     	'uri' => '/reservationcontract.pdf',
	     	'icon' => 'fa-file-pdf-o'
	     	];			
	  //enter
	     	$company1branches = [
	     	'code' => 'branches',
	     	'company_id' => 1,
	     	'process' => 'enter',
	     	'uifieldname' => 'Projects',
	     	'uri' => '/projects',
	     	'icon' => 'fa-building-o'
	     	];			
    	$company1 = [

         	$company1company,
			$company1manageUserTypes,
			$company1manageusers,
			$company1leasecontract,
			$company1reservationcontract,
			$company1branches,
			];
         DB::table('accesslevel')->insert($company1);
    }
}
