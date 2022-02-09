<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiments', function (Blueprint $table) {
            $table->id();
            $table->date('startDate');
            $table->date('endDate');
            $table->enum('selectMethod', array('Correlation', 'Cointegration', 'Distance', "Fluctuation", 'SDR', 'Stochastic', 'GA', 'NSGA2'));
            $table->float('k_close');
            $table->float('nSTD');
            $table->tinyInteger('window_size');
            $table->tinyInteger('predict_size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiments');
    }
}
