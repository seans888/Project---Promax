<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class AccessLevel extends Model
{
    //
    protected $table= 'accesslevel';
    protected $fillable = ['code', 'process','uifieldname', 'uri', 'icon'];
public static function saveUserLevelAccess($UserTypeCode){
        //for admin
                

                //for maintenance
                    $company1admincompany = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'company',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];
                    

                    $company1adminmanageusertype = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'usertypes',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];

                    $company1adminmanageusers = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'users',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];

                    $company1adminunittype = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'unittype',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                    $company1MaintenanceDocumentItem = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'documentitem',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                    $company1Maintenancepercentpricing = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'percentpricing',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                //for reports
                    $company1leasecontractReport = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'leasecontract',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];
                    $company1reservationcontractReport = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'reservationcontract',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];
                    $company1dss = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'dss',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                //for enter
                    $company1properties = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'properties',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];
                    
                    $company1Enterreservationcontract = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'enterreservationcontract',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];

                    $company1EnterUnits = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'units',
                    'enabled' => 1,
			     	'canadd' => 1,
			     	'candelete' => 1,
			     	'cansave' => 1
                    ];
                    
                     $company1EnterTenant = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'tenant',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                     $company1EnterInvoice = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'invoice',
                    'enabled' => 1,
                    'canadd' => 1,
                    'candelete' => 1,
                    'cansave' => 1
                    ];
                     
                    $company1EnterPayment = [
                    'usertype_code' => $UserTypeCode,
                    'company_id' => 1,
                    'AccessLevel_code' => 'payment',
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
            $company1properties,
            $company1Enterreservationcontract,
            $company1adminunittype,
            $company1EnterUnits,
            $company1EnterTenant,
            $company1EnterInvoice,
            $company1EnterPayment,
            $company1MaintenanceDocumentItem,
            $company1Maintenancepercentpricing,
            
         ];
         DB::table('usertypeaccesslevel')->insert($company1);
    }    

}
