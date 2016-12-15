<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         DB::table('property')->insert([
            [
            	'id' => 1
	            ,'name' => 'Promax Place'
	            ,'desc' => 'Makati City'
	            ,'company_id' => 1
            ], 
            [	'id' => 2
	            ,'name' => 'Marconi Place'
	            ,'desc' => 'Makati City'
	            ,'company_id' => 1
            ], 
            [	'id' => 3
	            ,'name' => 'Bautista'
	            ,'desc' => 'Makati City'
	            ,'company_id' => 1
            ],
            [	'id' => 4
	            ,'name' => 'Grageda Bldg.'
	            ,'desc' => 'Paranaque'
	            ,'company_id' => 1
            ], 
            [	'id' => 5
	            ,'name' => 'Valuenzuela Bldg.'
	            ,'desc' => 'Las Pinas'
	            ,'company_id' => 1
            ],
            [	'id' => 6
	            ,'name' => 'ACR APT./ACR COMM./ACR RES./ RESIDENTIALS'
	            ,'desc' => 'LAS PINAS/MAKATI/ALABANG'
	            ,'company_id' => 1
            ]
            
        ]);
    }
}
