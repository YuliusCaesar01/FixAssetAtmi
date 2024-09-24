<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institusi;
use App\Models\Lokasi;

class LokasisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lokasi::create([
            'nama_lokasi_yayasan' => 'MIKAEL-TIMUR',
            'keterangan_lokasi' => 'Karangasem',
            'kode_lokasi'=> '01',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'MIKAEL-TENGAH',
            'keterangan_lokasi' => 'Karangasem',
            'kode_lokasi'=> '02',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'MIKAEL-BARAT',
            'keterangan_lokasi' => 'Karangasem',
            'kode_lokasi'=> '03',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'SPORT Center',
            'keterangan_lokasi' => 'Mendungan',
            'kode_lokasi'=> '04',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'Pamplona',
            'keterangan_lokasi' => 'Mendungan',
            'kode_lokasi'=> '05',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'ADE',
            'keterangan_lokasi' => 'Mendungan',
            'kode_lokasi'=> '06',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'IDC',
            'keterangan_lokasi' => 'Blulukan',
            'kode_lokasi'=> '07',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'GONZAGA',
            'keterangan_lokasi' => 'Blulukan',
            'kode_lokasi'=> '08',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'SPORT Center',
            'keterangan_lokasi' => 'Blulukan',
            'kode_lokasi'=> '09',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'Ricci',
            'keterangan_lokasi' => 'Blulukan',
            'kode_lokasi'=> '10',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'Arrupe',
            'keterangan_lokasi' => 'Blulukan',
            'kode_lokasi'=> '11',
        ]);
        Lokasi::create([
            'nama_lokasi_yayasan' => 'Wisma Jojo',
            'keterangan_lokasi' => 'Cengklik',
            'kode_lokasi'=> '12',
        ]);
    }
}
