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
        // tam tru
        Schema::create('temporary_residence_form', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('people_id');
            $table->text('address');
            $table->string('reason');
            $table->string('note');
            $table->timestamps();
            // thoi gian tam tru tinh tu ngay dag ki  := created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_residence_form');
    }
};
