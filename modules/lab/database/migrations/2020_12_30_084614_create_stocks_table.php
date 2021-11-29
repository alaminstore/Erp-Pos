<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buyer_id');
            $table->integer('style_id');
            $table->integer('zalopo_id');
            $table->integer('invoice_no');
            $table->date('date_tb');
            $table->integer('roll_no');
            $table->integer('racklist_id');
            $table->integer('pattern_no');
            $table->integer('lot_no');
            $table->integer('receiving_qty');
            $table->string('uom_id');
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
        Schema::dropIfExists('stocks');
    }
}
