<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class TemporaryAbsenceForm extends Model
{
    use HasFactory;
    
    protected $table = 'temporary_absence_form';
    protected $fillable = [
        'people_id',
        'move_place',
        'move_time',
        'reason',
        'note',
    ];

    public function people(): HasOne
    {
        return $this->hasOne(People::class,'id','people_id');
    }
    

}
