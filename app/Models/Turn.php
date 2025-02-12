<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [
        'turn_number',
        'patient_document',
        'specialty_id',
        'status',
        'created_at'
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
