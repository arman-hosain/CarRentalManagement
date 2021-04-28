<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('NID');
            $table->string('email');
            $table->string('car_id');
            $table->string('car_brand');
            $table->string('picture');
            $table->string('message');
            $table->string('request_date');
            $table->string('request_status');
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
        Schema::dropIfExists('request_bookings');
    }
}
