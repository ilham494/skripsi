<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'legal_case_id',
        'nama_dokumen',
        'file',
        'keterangan',
    ];


    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }
}