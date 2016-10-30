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
            'id' => 1,
            'tenantname' => 'AR Talag',
            'address' => 'Quezon City',
            'telno' => '123-4567',
            'mobileno' => '09150001000',
            'occupation' => 'Lawyer',
            'company_id' => 1,
            'civilstatus' => 'single',
            'lastname' => 'Talag',
            'firstname' => 'Aurelio',
            'middlename' => 'R'
            ]
            
        ]);

    }
}
