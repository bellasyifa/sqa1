<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'jurusan' => 'required|in:Teknik Informatika,Sistem Informasi,Administrasi Bisnis,Komputerisasi Akuntansi',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'no_telp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto', 'public'); // Simpan di storage/public/foto
        }

        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

    // Tampilkan tampilan profil dengan data mahasiswa
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
    
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $id,
            'nama' => 'required|string',
            'jurusan' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'no_telp' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file foto
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update($validatedData);

        // Perbarui foto jika ada
        if ($request->hasFile('foto')) {
            // Simpan foto baru dan hapus foto lama jika ada
            if ($mahasiswa->foto) {
                Storage::delete($mahasiswa->foto); // Hapus foto lama
            }
            $path = $request->file('foto')->store('public/foto');
            $mahasiswa->foto = $path;
            $mahasiswa->save();
        }
    
        // Redirect ke halaman mahasiswa dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Hapus foto jika ada
        if ($mahasiswa->foto && \Storage::exists('public/' . $mahasiswa->foto)) {
            \Storage::delete('public/' . $mahasiswa->foto);
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
