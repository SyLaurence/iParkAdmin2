<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParkInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->float('payment');
            $table->text('entryimg');
            $table->text('exitimg');
            $table->text('receiptnum');
            $table->integer('user_info_id')->references('id')->on('user_info');
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
        Schema::drop('park_infos');
    }
}
