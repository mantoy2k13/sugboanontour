<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('vehicle_name');
            $table->string('path');
            $table->string('model');
            $table->string('year');
            $table->string('book_date');
            $table->string('location');
            $table->string('vehicle_type');
            $table->integer('book_status');
            $table->integer('driver_status');
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
        Schema::dropIfExists('cars');
    }
}
