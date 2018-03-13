<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_infos', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name');
            $table->string('rate_code');
            $table->integer('init_duration');
            $table->integer('dayhrcharge');
            $table->integer('overnight');
            $table->integer('flatrate');
            $table->integer('gracemin');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rate_infos');
    }
}
