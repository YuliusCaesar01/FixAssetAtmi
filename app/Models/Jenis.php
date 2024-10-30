<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jenis extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jenis'; //int autoincrement
    protected $fillable = [
        'id_jenis',
        'id_kelompok',
        'nama_jenis_yayasan',
        'nama_jenis_mikael',
        'nama_jenis_politeknik',
        'kode_jenis',
        'foto_jenis'
    ];

    public function kelompok(): BelongsTo
    {
        return $this->belongsTo(Kelompok::class, 'id_kelompok');
    }

    public function fixedasset()
    {
        return $this->hasMany(FixedAsset::class, 'id_fa');
    }

    public function permintaan_fa(): HasOne
    {
        return $this->hasOne(PermintaanFixedAsset::class, 'id_permintaan_fa');
    }
}
