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
            $table->string('identify_number',12);
            $table->date('move_time');
            $table->string('move_place');
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
