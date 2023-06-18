<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Household extends Model
{
    use HasFactory;

    protected $table = 'household';
    protected $fillable =[
        'owner_id',
        'address',
        'quantity'
    ];

    public function people():BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function owner():HasOne
    {
        return $this->hasOne(People::class,'id' ,'owner_id');
    }
    // add relational 
}
