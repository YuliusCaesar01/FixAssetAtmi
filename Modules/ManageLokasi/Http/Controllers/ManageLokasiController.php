<?php

namespace Modules\ManageLokasi\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Ruang;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManageLokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    protected $menu = 'Lokasi';
    public function index()
    {
        $data = Lokasi::get();
        return view('managelokasi::index')->with(['lokasi' => $data, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('managelokasi::create');
    }

    public function detail(string $id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi);
        $ruang = Ruang::where('id_lokasi', $id_lokasi)->get();
        return view("managelokasi::detail")->with(['lokasi' => $lokasi, 'ruang' => $ruang, 'menu' => $this->menu]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_lokasi' => 'required',
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        //kode lokasi bertambah sesuai nomor max di tabel
        $kode_max = lokasi::max('kode_lokasi');
        $kode_baru = $kode_max + 1;

        //create lokasi
        $lokasi = lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'kode_lokasi' => $kode_baru,
        ]);
        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Lokasi Berhasil Disimpan.',
            'data'    => $lokasi
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id_lokasi)
    {
        $lokasi = lokasi::find($id_lokasi);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Lokasi',
            'data'    => $lokasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('managelokasi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id_lokasi)
    {
       dd('okay');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
