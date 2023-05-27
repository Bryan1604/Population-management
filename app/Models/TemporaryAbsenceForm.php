<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryAbsenceForm extends Model
{
    use HasFactory;
    
    protected $table = 'temporary_absence_form';
    protected $fillable = [
        'id',
        'identify_number',
        'move_place',
        'move_time'
    ];
}
