<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LegalCase;

class Client extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
    ];

    public function cases()
    {
        return $this->hasMany(LegalCase::class);
    }
}