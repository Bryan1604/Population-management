<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamtru extends Model
{
    use HasFactory;

    protected $table = 'tamtru';
    protected $fillable = [
        'id',
        'date'
    ];
}
