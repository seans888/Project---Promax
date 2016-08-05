<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deleteall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         DB::table('notifications')->delete();
        DB::table('users')->delete();
        DB::table('employee')->delete();
        DB::table('section')->delete();
        DB::table('course')->delete();
        DB::table('yearlevel')->delete();
        DB::table('semester')->delete();
        DB::table('schoolyear')->delete();
        DB::table('usertypeaccesslevel')->delete();
        DB::table('users')->delete();
        DB::table('accesslevel')->delete();
        DB::table('department')->delete();
        DB::table('usertype')->delete();
        DB::table('company')->delete();
        
    }
}
