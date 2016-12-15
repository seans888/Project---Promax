<?php

use Illuminate\Database\Seeder;
use App\Constants;
class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('payments')->insert([
			[
			'id' => 1
			,'company_id' => 1
			,'date' => '2015-03-1'
			,'amount' => 26759.23
			,'desc' => 'full payment'
			,'status' => Constants::PAYMENTPOSTED
			]
			,
			[
			
			'id' => 2
			,'company_id' => 1
			,'date' => '2016-11-2'
			,'amount' => 400
			,'desc' => 'partial payment'
			,'status' => Constants::PAYMENTPOSTED
			]
			,

			[
			
			'id' => 3
			,'company_id' => 1
			,'date' => '2016-11-3'
			,'amount' => 26359.23
			,'desc' => 'partial payment'
			,'status' => Constants::PAYMENTPOSTED
			]
			,
			[
			
			'id' => 4
			,'company_id' => 1
			,'date' => '2016-11-5'
			,'amount' => 80277.69
			,'desc' => 'batch payment'
			,'status' => Constants::PAYMENTPOSTED
			]
			
		]);
    }
}
