<?php

use Illuminate\Database\Seeder;
use App\Constants;
class PercentPricingValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$wtax = Constants::WTAX;
    	$vat = Constants::VATAX;
    	$penalty = Constants::PENALTY;
        db::table('percentPricingValues')->insert([
			[
				'company_id' => 1
				,'code' => $wtax
				,'desc' => 'Withholding Tax'
				,'percent' => 0.05
			]
			,
			[
				'company_id' => 1
				,'code' => $vat
				,'desc' => 'Value Added Tax'
				,'percent' => 0.12
			]
			,
			[
				'company_id' => 1
				,'code' => $penalty
				,'desc' => 'Penalty'
				,'percent' => 0.03
			]
		]);
    }
}
