<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sid')->nullable();
            $table->string('buyer')->nullable();
            $table->string('zalopo')->nullable();
            $table->string('style')->nullable();
            $table->string('fabric_type')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('rack_floor')->nullable();
            $table->string('pattern_name')->nullable();
            $table->unsignedInteger('racklist_id')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('stockin');
    }
}
