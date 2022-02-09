<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ga_params', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('experimentId');
            $table->smallInteger('population');
            $table->smallInteger('generation');
            $table->float('crossoverRate');
            $table->float('mutationRate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ga__params');
    }
}
