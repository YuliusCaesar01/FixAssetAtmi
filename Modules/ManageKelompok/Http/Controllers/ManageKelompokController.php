<?php

namespace Modules\ManageKelompok\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kelompok;
use App\Models\Tipe;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManageKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $menu = 'Kelompok';
    public function index()
    {
        $data = Kelompok::orderBy('id_tipe')->get();
        $tipe = Tipe::all();
        return view('managekelompok::index')->with(['kelompok' => $data, 'tipe' => $tipe, 'menu' => $this->menu]);
    }

    public function detail(string $id_kelompok)
    {
        $kelompok = Kelompok::findOrFail($id_kelompok);
        $tipe = $kelompok->tipe;
        $jenis = Jenis::where('id_kelompok', $id_kelompok)->get();
        return view("managekelompok::detail")->with(['kelompok' => $kelompok, 'tipe' => $tipe, 'jenis' => $jenis, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('managekelompok::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kelompok' => 'required',
            'id_tipe' => 'required'
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        //kode tipe bertambah sesuai nomor max di tabel
        $kode_max = Kelompok::where('id_tipe', $request->id_tipe)->max('kode_kelompok');
        $kode_baru = str_pad($kode_max + 1, 3, '0', STR_PAD_LEFT);

        $kelompok = Kelompok::create([
            'nama_kelompok' => $request->nama_kelompok,
            'kode_kelompok' => $kode_baru,
            'id_tipe'       => $request->id_tipe,
        ]);

        //return response 
        return response()->json([
            'success' => true,
            'message' => 'Data Kelompok Berhasil Disimpan.',
            'data'    => $kelompok
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id_kelompok)
    {
        $kelompok = Kelompok::findOrFail($id_kelompok);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kelompok',
            'data'    => $kelompok
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('managekelompok::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id_kelompok)
    {
        $kelompok = Kelompok::findOrFail($id_kelompok);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelompok' => 'required',
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //update KELOMPOK
        $kelompok->update([
            'nama_kelompok' => $request->nama_kelompok,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Kelompok Berhasil Diubah.',
            'data'    => $kelompok
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
