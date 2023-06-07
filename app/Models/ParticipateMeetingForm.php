<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipateMeetingForm extends Model
{
    use HasFactory;
    protected $table = 'participate_meeting_form';
    protected $fillable = [
        'meeting_id',
        'people_id',
        'status',
    ];
}
