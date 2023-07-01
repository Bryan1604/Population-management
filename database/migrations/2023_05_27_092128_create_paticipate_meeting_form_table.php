<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participate_meeting_form', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('meeting_id')->unsigned();
            $table->integer('household_id');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('meeting_id')->references('id')->on('meeting');
            $table->foreign('household_id')->references('owner_id')->on('household_meeting');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participate_meeting_form');
    }
};
