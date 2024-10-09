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
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'nama_lokasi' => 'required|string|unique:lokasis,nama_lokasi_yayasan',
            'keterangan_lokasi' => 'required|string',
        ]);
    
        // Check if validation fails
    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput(); // Redirect back with errors and input
    }
        // Create a new location record
        $lokasi = Lokasi::create([
            'nama_lokasi_yayasan' => $request->nama_lokasi,
            'keterangan_lokasi' => $request->keterangan_lokasi,
            'kode_lokasi' => '' // Temporary default value
        ]);
    
        // Generate kode_lokasi based on the ID
        $kodeLokasi = str_pad($lokasi->id_lokasi, 2, '0', STR_PAD_LEFT); // Pad with leading zeros if needed
    
        // Update the record with the generated kode_lokasi
        $lokasi->update(['kode_lokasi' => $kodeLokasi]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Data lokasi telah ditambahkan!');
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
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_lokasi' => [
                'required',
                'string',
                'max:255',
                // Menambahkan aturan unik dengan mengecualikan ID lokasi saat ini
                'unique:lokasis,nama_lokasi_yayasan,' . $id . ',id_lokasi', // Ganti 'lokasis' dengan nama tabel yang sesuai
            ],
        ]);

        // Cari lokasi berdasarkan ID
        $lokasi = Lokasi::findOrFail($id);

        // Update data lokasi
        $lokasi->nama_lokasi_yayasan = $validatedData['nama_lokasi'];
        
        // Simpan perubahan ke database
        $lokasi->save();

        return redirect()->back()->with('success', 'Data jenis telah diupdate!');

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
