<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperimentWindowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_windows', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('experimentId');
            $table->enum('train_test', array('train', 'test'));
            $table->smallInteger('k_window');
            $table->string('stockA1Id', 4);
            $table->string('stockA2Id', 4);
            $table->string('stockB1Id', 4);
            $table->string('stockB2Id', 4);
            $table->double('A_return', 15, 4);
            $table->smallInteger('A_tradeCount');
            $table->smallInteger('A_successCount');
            $table->double('A_STDReturn', 15, 4);
            $table->double('A_MaxReturn', 15, 4);
            $table->double('A_MinReturn', 15, 4);
            $table->double('A_profit_loss_ratio', 15, 4)->nullable();
            $table->double('A_profitFactor', 15, 4)->nullable();
            $table->double('A_MaxDrawdown', 15, 4)->nullable();
            $table->double('B_return', 15, 4);
            $table->smallInteger('B_tradeCount');
            $table->smallInteger('B_successCount');
            $table->double('B_STDReturn', 15, 4);
            $table->double('B_MaxReturn', 15, 4);
            $table->double('B_MinReturn', 15, 4);
            $table->double('B_profit_loss_ratio', 15, 4)->nullable();
            $table->double('B_profitFactor', 15, 4)->nullable();
            $table->double('B_MaxDrawdown', 15, 4)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_window_');
    }
}
