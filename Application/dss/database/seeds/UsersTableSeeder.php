<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        //for company 1
        $mytime = Carbon\Carbon::now();
        $now= $mytime->toDateTimeString();
         DB::table('users')->insert([
            [
            'id' => 1,
            'name' => 'AR Talag',
            'username' => 'admin',
            'email' => 'talagrolandoaurelio@gmail.com',
            'password' => bcrypt('admin'),
            'status' => 'active',
            'company_id' => 1,
            'usertype_code' => 'admin',
            'created_at' => $now
            ]
            
        ]);

           

    }
}
