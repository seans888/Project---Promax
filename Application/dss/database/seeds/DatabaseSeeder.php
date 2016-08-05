<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
       
        DB::table('tenants')->delete();
        DB::table('branch')->delete();
        DB::table('users')->delete();
        DB::table('usertypeaccesslevel')->delete();
        DB::table('users')->delete();
        DB::table('accesslevel')->delete();
        DB::table('usertype')->delete();
        DB::table('company')->delete();
        $this->call(CompanyTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(AccessLevelTableSeeder::class);
        $this->call(UserTypeAccessLevelTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BranchTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
       
    }
}
