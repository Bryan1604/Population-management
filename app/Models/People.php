<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = "people";
    protected $fillable = [
        'id',
        'idHousehold',
        'fullname',
        'sex',
        'birthday',
        'placeOfBirth',
        'ethnic',
        'job',
        'office',
        'identifyNumber',
        'receivedIDCardPlaceAndTime',
        'phoneNumber',
        'originalPlace',
        'tgianDkThuongTru',   // chua biet dich sang tieng anh
        'addressBefore',
        'relationshipWithOwner',
        'note'
    ];

    // add realational 
}
