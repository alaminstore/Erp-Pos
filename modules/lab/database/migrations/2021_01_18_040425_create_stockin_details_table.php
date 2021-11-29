<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockinDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockin_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stockin_id');
            $table->string('sid');
            $table->string('color_id')->nullable();
            $table->string('fabriccomposition_id')->nullable();
            $table->string('gsm')->nullable();
            $table->string('dia')->nullable();
            $table->string('booking_qty')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('receiving_qty')->nullable();
            $table->string('uom')->nullable();
            $table->string('remarks')->nullable();
            $table->string('system')->nullable();
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
        Schema::dropIfExists('stockin_details');
    }
}
