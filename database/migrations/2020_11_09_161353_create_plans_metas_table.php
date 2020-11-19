<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans_metas', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name')->unique();
            $table->string('ROI')->unique();
            $table->string('initial_minimum_fee');
            $table->string('initial_maximum_fee');
            $table->string('payment_currency')->default('USD');
            $table->integer('time_rate')->index();
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
        Schema::dropIfExists('plans_metas');
    }
}
