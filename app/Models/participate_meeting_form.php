<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participate_meeting_form extends Model
{
    use HasFactory;

    protected $table = 'participate_meeting_form';
    protected $fillable = [
        'meeting_id',
        'houshold_id',
        'status'
    ];
}
