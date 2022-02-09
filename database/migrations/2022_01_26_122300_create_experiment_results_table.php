<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('experimentId');
            $table->enum('train_test', array('train', 'test'));
            $table->double('return', 15, 4);
            $table->smallInteger('tradeCount');
            $table->smallInteger('successCount');
            $table->double('STDReturn', 15, 4);
            $table->double('MaxReturn', 15, 4);
            $table->double('MinReturn', 15, 4);
            $table->double('profit_loss_ratio', 15, 4);
            $table->double('profitFactor', 15, 4);
            $table->double('MaxDrawdown', 15, 4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_results');
    }
}
