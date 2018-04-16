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
            $table->float('load_consumed');
            $table->text('entryimg');
            $table->text('exitimg')->nullable();
            $table->text('entryterminal');
            $table->text('exitterminal')->nullable();
            $table->text('paydate')->nullable();
            //entryteminal_id
            //exitterminal_id
            $table->text('receiptnum')->nullable();
            $table->string('user_info_id');
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
