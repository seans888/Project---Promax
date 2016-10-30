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
		     	
		     	$company1UnitType = [
				'code' => 'unittype',
		     	'company_id' => 1,
		     	'process' => 'maintenance',
		     	'uifieldname' => 'UnitType',
		     	'uri' => '/unittype/list',
		     	'icon' => 'fa-file-text-o'
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

			$company1dss = [
	     	'code' => 'dss',
	     	'company_id' => 1,
	     	'process' => 'reports',
	     	'uifieldname' => 'Decision Support',
	     	'uri' => '/dss',
	     	'icon' => 'fa-file-pdf-o'
	     	];			
	  //enter
	     	$company1branches = [
	     	'code' => 'properties',
	     	'company_id' => 1,
	     	'process' => 'enter',
	     	'uifieldname' => 'Properties',
	     	'uri' => '/property/list',
	     	'icon' => 'fa-building-o'
	     	];			
	     	$company1EnterReservationContract = [
	     	'code' => 'enterreservationcontract',
	     	'company_id' => 1,
	     	'process' => 'enter',
	     	'uifieldname' => 'Reservation Contract',
	     	'uri' => '/reservationcontract/list',
	     	'icon' => 'fa-file-text-o'
	     	];			
	     	$company1Units = [
	     	'code' => 'units',
	     	'company_id' => 1,
	     	'process' => 'enter',
	     	'uifieldname' => 'Units',
	     	'uri' => '/units/list',
	     	'icon' => 'fa-file-text-o'
	     	];					
	     	$company1Tenant = [
	     	'code' => 'tenant',
	     	'company_id' => 1,
	     	'process' => 'enter',
	     	'uifieldname' => 'Tenants',
	     	'uri' => '/tenant/list',
	     	'icon' => 'fa-file-text-o'
	     	];			

    	$company1 = [

         	$company1company,
			$company1manageUserTypes,
			$company1manageusers,
			$company1leasecontract,
			$company1reservationcontract,
			$company1branches,
			$company1EnterReservationContract,
			$company1UnitType,
			$company1Units,
			$company1Tenant,
			];
         DB::table('accesslevel')->insert($company1);
    }
}
