<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric-bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sid');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('season_id');
            $table->string('lc');
            $table->date('date');
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
        Schema::dropIfExists('fabric-bookings');
    }
}
