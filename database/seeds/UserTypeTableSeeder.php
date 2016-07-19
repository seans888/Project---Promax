<?php

use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    public function run()
    {        
    	//for company 1
		db::table('usertype')->insert([
			[
			'code' => 'admin',
			'desc' => 'admin',
			'company_id' => 1,
			'created_at' => '2016-01-01 06:00:00'
			]

		]);
    }
}
