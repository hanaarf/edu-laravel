<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\LatihanSoal;
use Illuminate\Http\Request;

class LatihanSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soals = LatihanSoal::with('jenjang', 'kelas')->get();
        return view('dashboard.latSoal.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.latSoal.create', compact('jenjangs', 'kelas'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            // Simpan file ke storage/media
            $filePath = $request->file('upload')->storeAs('media', $fileName);

            // Generate URL untuk akses file
            $url = asset('storage/media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        LatihanSoal::create($validated);

        return redirect()->route('latihan.index')->with('success', 'Soal latihan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LatihanSoal $latihanSoal)
    {
        return view('dashboard.latSoal.show', compact('latihanSoal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatihanSoal $latihanSoal)
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.latSoal.edit', compact('latihanSoal', 'jenjangs', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatihanSoal $latihanSoal)
    {
        $validated = $request->validate([
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban' => 'required|string',
        ]);

        $latihanSoal->update($validated);

        return redirect()->route('latihan_soal.index')->with('success', 'Soal latihan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatihanSoal $latihanSoal)
    {
        $latihanSoal->delete();
        return redirect()->route('latihan_soal.index')->with('success', 'Soal latihan berhasil dihapus');
    }
}
