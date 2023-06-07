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
        Schema::create('people', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('household_id'); // id ho khau 
            $table->String('fullname');
            $table->integer('sex');  // nen la luu o dang bool hoac int ( 0:nam, 1: nu)
            $table->date('birthday');
            $table->String('place_of_birth');
            $table->String('ethnic');
            $table->String('job');
            $table->String('office');
            $table->String('identify_number');  // thuc te la 1 chuoi so dinh danh ca nhan 
            $table->String('received_IDCard_place');
            $table->date('recieved_IDCard_time');
            $table->String('phone_number');
            $table->String('domicile'); // la 'nguyen quan' khac voi 'place of birth'
           // $table->date('tgianDkThuongTru'); // thoi gian dang ki thuoong tru
            $table->String('address_before'); // noi o truoc do
            $table->String('household_owner_relationship'); // quan he voi chu ho // cos thể dùng string hoặc int 
            $table->integer('state');   // 0: nguoi co ho khau, 1:co ho khau va tam vang, 2:- nguoi tam tru
            $table->String('note');
            $table->timestamps('');  // thoi gian tao ho khau la truong created-time-at trong db
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
