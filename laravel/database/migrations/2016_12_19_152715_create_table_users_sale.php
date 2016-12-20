<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_sale', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('region_id')->unsigned();
            $table->string('street');
            $table->string('street_number');
            $table->timestamp('service_day');
            $table->integer('service_id')->unsigned();
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('web');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('region_id')->references('id')->on('direction');
            /*$table->foreign('service_id')->references('id')->on('service');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_sale');
    }
}
