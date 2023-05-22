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
            $table->integer('idHousehold'); // id ho khau 
            $table->String('fullname');
            $table->String('sex');  // nen la luu o dang bool hoac int ( 0:nam, 1: nu)
            $table->date('birthday');
            $table->String('placeOfBirth');
            $table->String('ethnic');
            $table->String('job');
            $table->String('office');
            $table->String('identifyNumber');  // thuc te la 1 chuoi so dinh danh ca nhan 
            $table->String('receivedIDCardPlaceAndTime');
            $table->String('phoneNumber');
            $table->String('originalPlace'); // la 'nguyen quan' khac voi 'place of birth'
            $table->date('tgianDkThuongTru'); // thoi gian dang ki thuoong tru
            $table->String('addressBefore'); // noi o truoc do
            $table->String('relationshipWithOwner'); // quan he voi chu ho // cos thể dùng string hoặc int 
            $table->String('note');
            $table->timestamps('');
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
