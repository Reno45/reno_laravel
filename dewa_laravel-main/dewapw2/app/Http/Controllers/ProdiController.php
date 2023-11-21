<?php

namespace App\Http\Controllers;

use App\Models\Fakulitas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view("prodi.index")->with("prodi", $prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakulitas = Fakulitas::all();
        return view("prodi.create")->with("fakulitas", $fakulitas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            "nama" => "required|unique:prodis",
            "fakulitas_id" => "required"
        ]);

        //simpan data ke tabel prodis
        Prodi::create($validasi);
        return redirect("prodi")->with("success", "Data Prodi berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakulitas = Fakulitas::all();
        return view('prodi.create')->with('fakulitas', $fakulitas)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validasi = $request->validate([
            "nama" => "required",
            "fakulitas_id" => "required"
        ]);
        $prodi->update($validasi);

        return redirect('prodi')->with('success','Data Prodi Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        //
    }
}
