<?php

namespace Modules\ManageJenis\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kelompok;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManageJenisController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $menu = 'Jenis';

    public function index()
    {
        $data = Jenis::orderBy('id_kelompok')->get();
        $kelompok = Kelompok::get();
        return view('managejenis::index')->with(['jenis' => $data, 'kelompok' => $kelompok, 'menu' => $this->menu]);
    }

    public function detail(string $id_jenis)
    {
        $jenis = Jenis::findOrFail($id_jenis);
        $kelompok = $jenis->kelompok;
        return view("managejenis::detail")->with(['jenis' => $jenis, 'kelompok' => $kelompok, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('managejenis::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required',
            'id_kelompok' => 'required'
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        //kode tipe bertambah sesuai nomor max di tabel
        $kode_max = Jenis::where('id_kelompok', $request->id_kelompok)->max('kode_jenis');
        $kode_baru = str_pad($kode_max + 1, 3, '0', STR_PAD_LEFT);

        $jenis = Jenis::create([
            'nama_jenis' => $request->nama_jenis,
            'kode_jenis' => $kode_baru,
            'id_kelompok' => $request->id_kelompok,
        ]);

        //return response 
        return response()->json([
            'success' => true,
            'message' => 'Data Jenis Berhasil Disimpan.',
            'data'    => $jenis
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id_jenis)
    {
        $jenis = Jenis::findOrFail($id_jenis);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Jenis',
            'data'    => $jenis
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('managejenis::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id_jenis)
    {
        $jenis = Jenis::findOrFail($id_jenis);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_jenis' => 'required',
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update jenis
        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Jenis Berhasil Diubah.',
            'data'    => $jenis
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
