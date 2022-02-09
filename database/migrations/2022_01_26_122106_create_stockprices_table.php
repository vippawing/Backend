<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockprices', function (Blueprint $table) {
            $table->id();
            $table->string('stockId', 4);
            $table->dateTime('dateTime');
            $table->tinyInteger('kInterval');
            $table->float('open');
            $table->float('high');
            $table->float('low');
            $table->float('close');
            $table->smallInteger('volume');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stockprices');
    }
}
