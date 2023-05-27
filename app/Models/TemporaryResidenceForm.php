<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryResidenceForm extends Model
{
    use HasFactory;
    protected $table = "temporary_residence_form";
    protected $fillable = [
        'id',
        'identify_number',
        'note'
    ];
}
