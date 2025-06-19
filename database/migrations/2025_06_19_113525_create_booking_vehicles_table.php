<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('pick_up_date')->nullable();
            $table->string('return_date')->nullable();
            $table->string('booking_status')->nullable();
            $table->string('client_location')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('message')->nullable();
            $table->string('client_name')->nullable();
            $table->string('column1')->nullable();
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
        Schema::dropIfExists('booking_vehicles');
    }
}
