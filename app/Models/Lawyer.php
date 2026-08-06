<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LegalCase;

class Lawyer extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'nomor_izin_advokat',
        'spesialisasi',
        'alamat',
    ];
public function cases()
{
    return $this->hasMany(LegalCase::class);
}
    }