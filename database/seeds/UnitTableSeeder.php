<?php

use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
          DB::table('unit')->insert([
            [
            'unitCode' => '1717A', 'company_id' => 1, 'property_id'=> 1, 'unittype_unittype' =>'studio' ,'company_id' => 1
            ],
            [
            'unitCode' => '1716b', 'company_id' => 1, 'property_id'=> 1, 'unittype_unittype' =>'commercial','company_id' => 1
            ],
            [
            'unitCode' => '202', 'company_id' => 1, 'property_id'=> 1, 'unittype_unittype' =>'studio','company_id' => 1
            ],
            [
            'unitCode' => '202b', 'company_id' => 1, 'property_id'=> 2, 'unittype_unittype' =>'studio','company_id' => 1
            ],
            [
            'unitCode' => '201b', 'company_id' => 1, 'property_id'=> 2, 'unittype_unittype' =>'commercial','company_id' => 1
            ],
        ]);
    }
}
