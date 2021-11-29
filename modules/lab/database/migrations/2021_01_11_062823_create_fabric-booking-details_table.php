<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric-booking-details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fabric_booking_id');
            $table->string('sid');
            $table->unsignedInteger('buyer_id');
            $table->unsignedInteger('style_id');
            $table->unsignedInteger('zalopo_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('fabriccomposition_id');
            $table->string('gsm');
            $table->string('dia');
            $table->float('booking_qty');
            $table->float('value');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('fabric-booking-details');
    }
}
