<?php

namespace Modules\ManageRuang\Http\Controllers;

use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\Ruang;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManageRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $menu = 'Ruang';
    public function index()
    {
        $data = $ruang = Ruang::all();
      return view('manageruang::index')->with(['ruang' => $data,'menu' => $this->menu ]);
    }

    public function detail(string $id_ruang)
    {
        $ruang = Ruang::findOrFail($id_ruang);
        $lokasi = Lokasi::where('id_lokasi', $ruang->id_lokasi)->get();
        return view("manageruang::detail")->with(['ruang' => $ruang,'lokasi' => $lokasi, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('manageruang::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required',
            'id_divisi' => 'required',
            'id_lokasi' => 'required'
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        //kode divisi bertambah sesuai nomor max di tabel
        $kode_max = Ruang::where('id_divisi', $request->id_divisi)->max('kode_ruang');
        $kode_baru = str_pad($kode_max + 1, 2, '0', STR_PAD_LEFT);

        $ruang = Ruang::create([
            'nama_ruang' => $request->nama_ruang,
            'kode_ruang' => $kode_baru,
            'id_divisi'  => $request->id_divisi,
            'id_lokasi'  => $request->id_lokasi
        ]);

        //return response 
        return response()->json([
            'success' => true,
            'message' => 'Data Ruang Berhasil Disimpan.',
            'data'    => $ruang
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id_ruang)
    {
        $ruang = Ruang::findOrFail($id_ruang);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Ruang',
            'data'    => $ruang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('manageruang::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id_ruang)
    {
        $ruang = Ruang::findOrFail($id_ruang);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_ruang' => 'required',
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update ruang
        $ruang->update([
            'nama_ruang' => $request->nama_ruang,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Ruang Berhasil Diubah.',
            'data'    => $ruang
        ]);
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
