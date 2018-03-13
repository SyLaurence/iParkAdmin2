<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ipadd');
            $table->string('name');
            $table->text('comp_name');
            $table->tinyInteger('loop_status');
            $table->integer('type');
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
        Schema::drop('terminal_infos');
    }
}
