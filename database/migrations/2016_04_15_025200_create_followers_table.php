<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        // Schema::create('followers', function ($table)
        // {
        //     $table->increments('id');
        //     $table->integer('user_id')->unsigned();
        //     $table->integer('follow_id')->unsigned();
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('follow_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->nullableTimestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::drop('followers');
    }
}
