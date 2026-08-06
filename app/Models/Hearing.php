<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hearing extends Model
{
    protected $fillable = [
        'legal_case_id',
        'tanggal_sidang',
        'jam',
        'tempat',
        'agenda',
        'status'
    ];


    public function legalCase()
    {
        return $this->belongsTo(
            LegalCase::class,
            'legal_case_id'
        );
    }
}