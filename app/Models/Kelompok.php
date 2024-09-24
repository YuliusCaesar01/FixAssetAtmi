<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelompok extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelompok'; //int autoincrement
    protected $fillable = [
        'id_kelompok',
        'id_tipe',
        'nama_kelompok_yayasan',
        'nama_kelompok_mikael',
        'nama_kelompok_politeknik',
        'kode_kelompok'
    ];

    public function tipe(): BelongsTo
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }

    public function jenis(): HasMany
    {
        return $this->hasMany(Jenis::class, 'id_jenis');
    }

    public function fixedasset(): HasMany
    {
        return $this->hasMany(FixedAsset::class, 'id_fa');
    }

    public function permintaan_fa(): HasMany
    {
        return $this->hasMany(PermintaanFixedAsset::class, 'id_permintaan_fa');
    }
}
