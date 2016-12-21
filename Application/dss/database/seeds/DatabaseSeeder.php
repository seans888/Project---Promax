<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('percentPricingValues')->delete();
        DB::table('invoicepayments')->delete(); 
        DB::table('payments')->delete(); 
        DB::table('invoicedetails')->delete(); 
        DB::table('documentItem')->delete();
        DB::table('invoice')->delete();
        DB::table('reservationcontract')->delete();
        DB::table('tenants')->delete();
        DB::table('unit')->delete();
        DB::table('unittype')->delete();
        DB::table('property')->delete();
        DB::table('users')->delete();
        DB::table('usertypeaccesslevel')->delete();
        DB::table('users')->delete();
        DB::table('accesslevel')->delete();
        DB::table('usertype')->delete();
        DB::table('company')->delete();
        $this->call(CompanyTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(AccessLevelTableSeeder::class);
        $this->call(UserTypeAccessLevelTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PropertyTableSeeder::class);
        $this->call(UnittypeTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        $this->call(ReservationContractTableSeeder::class);
        $this->call(InvoiceTableSeeder::class);
        $this->call(DocumentItemTableSeeder::class);
        $this->call(InvoiceDetailsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(InvoicePaymentsTableSeeder::class);
        $this->call(PercentPricingValueTableSeeder::class);
        
    }
}
