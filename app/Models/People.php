<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class People extends Model
{
    use HasFactory;

    protected $table = "people";
    protected $fillable = [
        'id',
        'household_id',
        'fullname',
        'sex',
        'birthday',
        'place_of_birth',
        'ethnic',
        'job',
        'office',
        'identify_number',
        'received_IDCard_place',
        'received_IDCard_time',
        'phone_number',
        'domicile',   // nguyen quan 
        //'tgianDkThuongTru',   // chua biet dich sang tieng anh
        'address_before',
        'household_owner_relationship',
        'state',
        'note'
    ];

    // add realational 
    public function household(): HasOne
    {
        return $this->hasOne(Household::class);
    }

    public function isOwner(): BelongsTo      // tra ve ho khau ma mk la chu 
    {
        return $this->belongsTo(Household::class);
    }

    public function temporaryAbsenceForm():BelongsTo
    {
        return $this->belongsTo(TemporaryAbsenceForm::class);
    }

    public function temporaryResidenceForm():BelongsTo
    {
        return $this->belongsTo(TemporaryResidenceForm::class);
    }
}
