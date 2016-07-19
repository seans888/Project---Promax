<?php

use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    
    public function run()
    {
         //
         DB::table('company')->insert([
            [
            'id' => 1,
            'name' => 'Main Company',
            'desc' => 'Main Company',
            'parent' => null
            
            ],
            [
            'id' => 2,
            'name' => 'Branch Company',
            'desc' => 'Branch Company',
            'parent' => 1
            
            ]
        	]);
    }
}
