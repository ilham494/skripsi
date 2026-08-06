<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lawyer;
use App\Models\Client;
use App\Models\Document;
use App\Models\Hearing;

class LegalCase extends Model
{
    protected $table = 'cases';

    protected $fillable = [
        'client_id',
        'lawyer_id',
        'nomor_perkara',
        'judul_perkara',
        'jenis_perkara',
        'status',
        'tanggal_mulai',
        'deskripsi',
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id');
    }


    public function hearings()
    {
        return $this->hasMany(Hearing::class, 'legal_case_id');
    }


    public function documents()
    {
        return $this->hasMany(Document::class, 'legal_case_id');
    }
}