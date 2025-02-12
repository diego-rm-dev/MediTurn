<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [

        'name',
        'time_limit',
        'internal_code',
    ];

    public function turns()
    {
        return $this->hasMany(Turn::class);
    }
}
