<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormSubmitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_form_submits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('subject');
            $table->mediumText('message');
            $table->string('opened');
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
        Schema::dropIfExists('contact_form_submits');
    }
}
