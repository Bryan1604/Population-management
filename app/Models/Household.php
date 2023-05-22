<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    use HasFactory;

    protected $table = 'household';
    protected $fillable =[
        'id',
        'idOwner',
        'address',
        'quantity'
    ];

    // add relational 
}
