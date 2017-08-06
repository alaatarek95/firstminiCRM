<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowupsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employeeId')->unsigned();
            $table->integer('customerID')->unsigned();
            $table->foreign('employeeId')->references('id')->on('users');
            $table->foreign('customerID')->references('id')->on('customers');
            $table->date('date');
            $table->string('type');
            $table->text('summery');
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
        Schema::dropIfExists('followups');
    }
}
