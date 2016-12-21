<?php

use Illuminate\Database\Seeder;
use App\Constants;
class DocumentItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        db::table('documentItem')->insert([
			[
			'code' => Constants::LEASEBILL
			,'desc' => 'Monthly Rental'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 1
			,'wtaxable' => 1
			,'penalizable' => 1
			,'systemVariable' => 1
			]
			,
			[
			'code' => Constants::WATERBILL
			,'desc' => 'Water Bill'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 1
			]
			,
			[
			'code' => Constants::PENALTY
			,'desc' => 'Penalty'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 1
			,'systemVariable' => 1
			
			]
			,
			[
			'code' => Constants::WTAX
			,'desc' => 'Withholding Tax'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 1
			
			]
			,
			[
			'code' => Constants::VATAX
			,'desc' => 'Value Added Tax'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 1
			
			]
			,
			[
			'code' => 'CUSA'
			,'desc' => 'Common Use Service Area fee'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 0
			]
			,
			[
			'code' => 'Adjustment'
			,'desc' => 'Adjustment. Used for correction, credit or debit memo functionality. can be negative or positive'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 0
			]
			,
			[
			'code' => 'Reservation fee'
			,'desc' => 'Reservation fee'
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 1
			,'systemVariable' => 0
			]
			,
			[
			'code' => Constants::TRANSFERRED
			,'desc' => Constants::TRANSFERRED
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 1
			]
			,
			[
			'code' => Constants::PREVIOUSINVOICEUNPAIDBALANCE
			,'desc' => Constants::PREVIOUSINVOICEUNPAIDBALANCE
			,'company_id' => 1
			,'defaultAmount' => 0
			,'vataxable' => 0
			,'wtaxable' => 0
			,'penalizable' => 0
			,'systemVariable' => 1
			]

		]);
    }
}
