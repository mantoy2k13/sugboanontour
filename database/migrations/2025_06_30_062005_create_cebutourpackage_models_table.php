<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCebutourpackageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cebutourpackage_models', function (Blueprint $table) {
            $table->id();
            $table->integer('tour_id')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('no_of_pax')->nullable();
            $table->string('cl_location')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('message')->nullable();
            $table->string('email')->nullable();
            $table->string('category_title')->nullable();
            $table->string('r_column1')->nullable();
            $table->string('r_column2')->nullable();
            $table->string('r_column3')->nullable();
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
        Schema::dropIfExists('cebutourpackage_models');
    }
}
