<?php

namespace Modules\ManageTipe\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Tipe;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class ManageTipeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected  $menu = 'Tipe';

    public function index()
    {
        $data = Tipe::get();
        return view('managetipe::index')->with(['tipe' => $data, 'menu' => $this->menu]);
    }

    public function detail($id_tipe)
    {
        $data = Tipe::findOrFail($id_tipe);
        $kelompok = Kelompok::where('id_tipe', $id_tipe)->get();
        return view("managetipe::detail")->with(['tipe' => $data, 'kelompok' => $kelompok, 'menu' => $this->menu]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('managetipe::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_tipe' => 'required'
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        //kode tipe bertambah sesuai nomor max di tabel
        $kode_max = Tipe::max('kode_tipe');
        $kode_baru = str_pad($kode_max + 1, 2, '0', STR_PAD_LEFT);

        //create TIPE
        $tipe = Tipe::create([
            'nama_tipe' => $request->nama_tipe,
            'kode_tipe' => $kode_baru,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Tipe Berhasil Disimpan.',
            'data'    => $tipe
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($kode_tipe)
    {
        $tipe = Tipe::findOrFail($kode_tipe);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Tipe',
            'data'    => $tipe
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('managetipe::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id_tipe)
    {
        $tipe = Tipe::findOrFail($id_tipe);
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_tipe' => 'required',
        ]);

        //check validation 
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create tipe
        $tipe->update([
            'nama_tipe' => $request->nama_tipe,
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Tipe Berhasil Diubah.',
            'data'    => $tipe
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
