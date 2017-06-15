<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataminingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datamining_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('car_park');
            $table->integer('garden');
            $table->integer('one_bedroom');
            $table->integer('two_bedroom');
            $table->integer('three_bedroom');
            $table->integer('one_bathroom');
            $table->integer('two_bathroom');
            $table->integer('three_bathroom');
            $table->integer('guest_room');
            $table->integer('library');
            $table->integer('solar_pannels');
            $table->string('house_name');
            $table->string('location');
            $table->text('description');
            $table->integer('price');
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
        Schema::dropIfExists('datamining_options');
    }
}
