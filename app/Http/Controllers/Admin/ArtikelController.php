<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('dashboard.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan artikel baru
        Artikel::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'cover_image' => $request->hasFile('cover_image') ? $request->file('cover_image')->store('cover_artikel') : null,
        ]);

        return redirect()->route('artikel.index')->with('Sukses', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        return view('dashboard.artikel.show', compact('artikel'));
    }    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('dashboard.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::findOrFail($id);

        $data = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('cover_image')) {
            if ($artikel->cover_image && Storage::exists($artikel->cover_image)) {
                Storage::delete($artikel->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('cover_artikel');
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('Sukses', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->cover_image && Storage::exists($artikel->cover_image)) {
            Storage::delete($artikel->cover_image);
        }

        $artikel->delete();

        return redirect()->back()->with('Delete', 'Artikel berhasil dihapus');
    }
}
