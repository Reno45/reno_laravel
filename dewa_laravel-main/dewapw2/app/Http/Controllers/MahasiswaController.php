<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view("mahasiswa.create")->with("prodi", $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "npm" => "required|unique:mahasiswas",
            "nama" => "required",
            "tmpt_lahir" => "required",
            "tgl_lahir" => "required",
            "foto" => "required|image",
            "prodi_id" => "required",
        ]);

        // ambil extensi file foto
        $ext = $request->foto->getClientOriginalExtension();
        // Rename file foto menjadi npm.extensi (cth: 2226250101.png)
        $validasi["foto"] = $request->npm . "." . $ext;
        //upload file foto ke dalam folder public/foto
        $request->foto->move(public_path('foto'), $validasi['foto']);
        //simpan data ke tabel mahasiswas
        Mahasiswa::create($validasi);
        return redirect("mahasiswa")->with("success", "Data Fakulitas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::all();
        return view("mahasiswa.edit")->with("mahasiswa", $mahasiswa)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        // return response("Data Sudah Berhasil Di Hapus", 200);

        return redirect()->route('mahasiswa.index')->with(
            'success',
            'Data telah dihapus.'
        );
    }
}
