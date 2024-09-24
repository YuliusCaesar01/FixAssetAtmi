<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipe extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tipe'; //int autoincrement
    protected $fillable = [
        'id_tipe',
        'nama_tipe_yayasan',
        'nama_tipe_mikael',
        'nama_tipe_politeknik',
        'kode_tipe'
    ];

    public function kelompok(): HasMany
    {
        return $this->hasMany(Kelompok::class, 'id_kelompok');
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
