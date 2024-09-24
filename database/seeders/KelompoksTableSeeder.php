<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelompok;

class KelompoksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        Kelompok::create([
            'id_tipe' => '1', // Aset Tetap
            'nama_kelompok_yayasan' => 'Tanah',
            'kode_kelompok' => '01'
        ]);

        //2
        Kelompok::create([
            'id_tipe' => '1', // Aset Tetap
            'nama_kelompok_yayasan' => 'Bangunan',
            'kode_kelompok' => '02'
        ]);

        //3
        Kelompok::create([
            'id_tipe' => '2', // Aset Bergerak
            'nama_kelompok_yayasan' => 'Mesin',
            'kode_kelompok' => '03'
        ]);

        //4
        Kelompok::create([
            'id_tipe' => '2', // Aset Bergerak
            'nama_kelompok_yayasan' => 'Kendaraan',
            'kode_kelompok' => '04'
        ]);

        //5
        Kelompok::create([
            'id_tipe' => '3', // Teknologi
            'nama_kelompok_yayasan' => 'Komputer',
            'kode_kelompok' => '05'
        ]);

        //6
        Kelompok::create([
            'id_tipe' => '3', // Teknologi
            'nama_kelompok_yayasan' => 'Inventaris',
            'kode_kelompok' => '06'
        ]);

        //7
        Kelompok::create([
            'id_tipe' => '4', // Perabot Kantor
            'nama_kelompok_yayasan' => 'Chair',
            'kode_kelompok' => '07'
        ]);

        //8
        Kelompok::create([
            'id_tipe' => '3', // Teknologi
            'nama_kelompok_yayasan' => 'Perlengkapan IT',
            'kode_kelompok' => '08'
        ]);

        //9
        Kelompok::create([
            'id_tipe' => '4', // Perabot Kantor
            'nama_kelompok_yayasan' => 'Cabinet',
            'kode_kelompok' => '09'
        ]);

        //10
        Kelompok::create([
            'id_tipe' => '4', // Perabot Kantor
            'nama_kelompok_yayasan' => 'Table',
            'kode_kelompok' => '10'
        ]);

        //11
        Kelompok::create([
            'id_tipe' => '2', // Aset Bergerak
            'nama_kelompok_yayasan' => 'Cutting',
            'kode_kelompok' => '12'
        ]);

        //12
        Kelompok::create([
            'id_tipe' => '5', // Kendaraan
            'nama_kelompok_yayasan' => 'Mobil',
            'kode_kelompok' => '13'
        ]);

        //13
        Kelompok::create([
            'id_tipe' => '5', // Kendaraan
            'nama_kelompok_yayasan' => 'Truck',
            'kode_kelompok' => '14'
        ]);

        //14
        Kelompok::create([
            'id_tipe' => '3', // Teknologi
            'nama_kelompok_yayasan' => 'Software',
            'kode_kelompok' => '15'
        ]);
    }
}
