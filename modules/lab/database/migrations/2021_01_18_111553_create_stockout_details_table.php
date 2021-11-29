<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockout_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stockout_id');
            $table->string('systemout')->nullable();
            $table->string('systemin')->nullable();
            $table->unsignedInteger('color_id')->nullable();
            $table->unsignedInteger('fabriccomposition_id')->nullable();
            $table->string('gsm')->nullable();
            $table->string('dia')->nullable();
            $table->string('booking_quantity')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('delivery_quantity')->nullable();
            $table->string('uom')->nullable();
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
        Schema::dropIfExists('stockout_details');
    }
}
