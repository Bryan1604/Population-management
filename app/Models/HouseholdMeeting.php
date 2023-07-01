<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseholdMeeting extends Model
{
    use HasFactory;

    protected $table = 'household_meeting';
    protected $fillable =[
        'owner_id',
        'address',
        'quantity'
    ];
}
