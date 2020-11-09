<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user');
            $table->integer('pass');
            $table->timestamps();
        });

        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timezone_type');
            $table->string('timezone');
            $table->timestamps('Time');
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
