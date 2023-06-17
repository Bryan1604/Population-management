<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class TemporaryResidenceForm extends Model
{
    use HasFactory;
    protected $table = "temporary_residence_form";
    protected $fillable = [
        'people_id',
        'address',
        'reason'.
        'note'
    ];

    public function people(): HasOne
    {
        return $this->hasOne(People::class,'id','people_id');
    }
}
