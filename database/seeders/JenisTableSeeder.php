<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JenisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenis = array(
            array('id_jenis' => '1','id_kelompok' => '2','nama_jenis_yayasan' => 'Rumah Retret','kode_jenis' => '001','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '2','id_kelompok' => '5','nama_jenis_yayasan' => 'PC','kode_jenis' => '002','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '3','id_kelompok' => '5','nama_jenis_yayasan' => 'Komputer Server','kode_jenis' => '003','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '4','id_kelompok' => '5','nama_jenis_yayasan' => 'Laptop Tradisional','kode_jenis' => '004','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '5','id_kelompok' => '5','nama_jenis_yayasan' => 'Convertible, Hybrid, 2-in-1','kode_jenis' => '005','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '6','id_kelompok' => '3','nama_jenis_yayasan' => 'Lathe Machine','kode_jenis' => '006','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '7','id_kelompok' => '3','nama_jenis_yayasan' => 'Milling Machine','kode_jenis' => '007','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '8','id_kelompok' => '6','nama_jenis_yayasan' => 'Surface Grinding','kode_jenis' => '008','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '9','id_kelompok' => '6','nama_jenis_yayasan' => 'Cylindrical Grinding','kode_jenis' => '009','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '10','id_kelompok' => '6','nama_jenis_yayasan' => 'EDM','kode_jenis' => '010','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '11','id_kelompok' => '3','nama_jenis_yayasan' => 'Drilling Machine','kode_jenis' => '011','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '12','id_kelompok' => '6','nama_jenis_yayasan' => 'Plastik Injection','kode_jenis' => '012','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '13','id_kelompok' => '3','nama_jenis_yayasan' => 'Hydraulic Press Machine','kode_jenis' => '013','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '14','id_kelompok' => '6','nama_jenis_yayasan' => 'Punching','kode_jenis' => '014','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '15','id_kelompok' => '6','nama_jenis_yayasan' => 'Bending','kode_jenis' => '015','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '16','id_kelompok' => '11','nama_jenis_yayasan' => 'Cutting Manual','kode_jenis' => '016','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '17','id_kelompok' => '11','nama_jenis_yayasan' => 'Cutting CNC','kode_jenis' => '017','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '18','id_kelompok' => '11','nama_jenis_yayasan' => 'Cutting/Bending/Folding','kode_jenis' => '018','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '19','id_kelompok' => '3','nama_jenis_yayasan' => 'Sawing Machine','kode_jenis' => '019','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '20','id_kelompok' => '6','nama_jenis_yayasan' => 'Heat Treatment Oven','kode_jenis' => '020','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '21','id_kelompok' => '6','nama_jenis_yayasan' => 'Welding','kode_jenis' => '021','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '22','id_kelompok' => '6','nama_jenis_yayasan' => 'Compressor','kode_jenis' => '022','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '23','id_kelompok' => '6','nama_jenis_yayasan' => 'Painting','kode_jenis' => '023','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '24','id_kelompok' => '6','nama_jenis_yayasan' => 'Polishing','kode_jenis' => '024','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '25','id_kelompok' => '6','nama_jenis_yayasan' => 'Hoist','kode_jenis' => '025','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '26','id_kelompok' => '6','nama_jenis_yayasan' => 'Packing','kode_jenis' => '026','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '27','id_kelompok' => '3','nama_jenis_yayasan' => 'Genset','kode_jenis' => '027','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '28','id_kelompok' => '5','nama_jenis_yayasan' => 'Media Penyimpan','kode_jenis' => '028','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '29','id_kelompok' => '5','nama_jenis_yayasan' => 'CPU','kode_jenis' => '029','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '30','id_kelompok' => '5','nama_jenis_yayasan' => 'Monitor','kode_jenis' => '030','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '31','id_kelompok' => '8','nama_jenis_yayasan' => 'Printer','kode_jenis' => '031','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '32','id_kelompok' => '7','nama_jenis_yayasan' => 'UPS','kode_jenis' => '032','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '33','id_kelompok' => '5','nama_jenis_yayasan' => 'Laptop/Netbook','kode_jenis' => '033','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '34','id_kelompok' => '7','nama_jenis_yayasan' => 'Hub','kode_jenis' => '034','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '35','id_kelompok' => '8','nama_jenis_yayasan' => 'Repeater','kode_jenis' => '035','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '36','id_kelompok' => '7','nama_jenis_yayasan' => 'Viewer','kode_jenis' => '036','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '37','id_kelompok' => '8','nama_jenis_yayasan' => 'Camera','kode_jenis' => '037','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id_jenis' => '38','id_kelompok' => '8','nama_jenis_yayasan' => 'Handy Cam','kode_jenis' => '038','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );

        DB::table('Jenis')->insert($jenis);
    
    }
}
