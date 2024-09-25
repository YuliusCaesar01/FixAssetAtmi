<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'notifications';

    // Define the primary key
    protected $primaryKey = 'notif_id';

    // Define which attributes are mass assignable
    protected $fillable = [
        'nama_notif',
        'jenis_notif',
        'id_asal',
        'id_tujuan',
        'id_pengajuan',
        'notif_periode',
        'notif_expired'
    ];

    // Relationships

    /**
     * The notification belongs to the user who originated it (asal).
     */
    public function asal()
    {
        return $this->belongsTo(User::class, 'id_asal');
    }

    /**
     * The notification belongs to a role that it is destined for (tujuan).
     */
    public function tujuan()
    {
        return $this->belongsTo(Role::class, 'id_tujuan');
    }

    /**
     * The notification is related to a specific pengajuan (fixed asset request).
     */
    public function pengajuan()
    {
        return $this->belongsTo(PermintaanFixedAsset::class, 'id_pengajuan', 'id_permintaan_fa');
    }
}
