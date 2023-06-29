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
        // tam vang
        Schema::create('temporary_absence_form', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('people_id');
            $table->date('move_time');
            $table->string('move_place');
            $table->text('reason');
            $table->text('note');
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
        Schema::dropIfExists('temporary_absence_form');
    }
};
