<?php

use Illuminate\Database\Seeder;

class UnittypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
          DB::table('unittype')->insert([
            [
            'unittype' => 'studio','company_id' => 1
            ],
            [
            'unittype' => 'commercial','company_id' => 1
            ],
        ]);
    }
}
