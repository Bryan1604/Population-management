<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamvang extends Model
{
    use HasFactory;

    protected $table = 'tamvang';

    protected $fillable =[
        'id',
        'date'
    ];

}
