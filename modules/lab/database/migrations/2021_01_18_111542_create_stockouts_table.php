<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('systemout')->nullable();
            $table->string('systemin')->nullable();
            $table->date('date')->nullable();
            $table->string('delivery')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('buyer')->nullable();
            $table->string('zalopo')->nullable();
            $table->string('style')->nullable();
            $table->string('req_no')->nullable();
            $table->string('racklist')->nullable();
            $table->string('rack_floor')->nullable();
            $table->string('fabric_type')->nullable();
            $table->string('pattern_name')->nullable();
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
        Schema::dropIfExists('stockouts');
    }
}
