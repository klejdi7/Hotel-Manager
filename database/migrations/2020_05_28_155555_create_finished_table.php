<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinishedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reservation_id')->unique();
            $table->string('fname_res');
            $table->string('lname_res');
            $table->string('nid');
            $table->integer('room_nr')->unique();
            $table->string('plan_type');
            $table->integer('adults');
            $table->integer('children');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('price');
            $table->string('res_by');
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
        Schema::dropIfExists('finished');
    }
}
