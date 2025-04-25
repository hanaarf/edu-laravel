<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\LatihanPdf;
use App\Models\MateriPdf;
use Illuminate\Http\Request;

class LatihanPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soals = LatihanPdf::all();
        return view('dashboard.latPdf.index', compact('soals'));
    }

    public function filter($kelas)
    {
        $materiPdf = MateriPdf::where('kelas_id', $kelas)->get();
        $soals = LatihanPdf::whereIn('materi_pdf_id', $materiPdf->pluck('id'))->get();
        return view('dashboard.latPdf.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        return view('dashboard.latPdf.create', compact('jenjangs'));
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

    public function getMateriPdf($kelas_id)
    {
        $materi = MateriPdf::where('kelas_id', $kelas_id)->get();
        return response()->json($materi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_pdf_id' => 'required',
            'pertanyaan' => 'required|array',
            'pertanyaan.*' => 'required|string',
            'opsi_a' => 'required|array',
            'opsi_a.*' => 'required|string',
            'opsi_b' => 'required|array',
            'opsi_b.*' => 'required|string',
            'opsi_c' => 'required|array',
            'opsi_c.*' => 'required|string',
            'opsi_d' => 'required|array',
            'opsi_d.*' => 'required|string',
            'jawaban' => 'required|array',
            'jawaban.*' => 'required|in:A,B,C,D',
            'xp' => 'required|array',
            'xp.*' => 'required|numeric|min:0',
        ]);

        $materi_pdf_id = $request->materi_pdf_id;

        // Proses penyimpanan setiap soal
        foreach ($request->pertanyaan as $key => $pertanyaan) {
            LatihanPdf::create([
                'materi_pdf_id' => $materi_pdf_id,
                'pertanyaan' => $pertanyaan,
                'opsi_a' => $request->opsi_a[$key],
                'opsi_b' => $request->opsi_b[$key],
                'opsi_c' => $request->opsi_c[$key],
                'opsi_d' => $request->opsi_d[$key],
                'jawaban' => $request->jawaban[$key],
                'xp' => $request->xp[$key],
            ]);
        }

        return redirect()->route('latihan_pdf.index')->with('success', 'Soal latihan berhasil ditambahkan');
    }




    /**
     * Display the specified resource.
     */
    public function show(LatihanPdf $latihan_pdf)
    {
        return view('dashboard.latPdf.show', compact('latihanSoal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatihanPdf $latihan_pdf)
    {
        $jenjangs = Jenjang::all();
        return view('dashboard.latPdf.edit', compact('latihan_pdf', 'jenjangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatihanPdf $latihan_pdf)
    {
        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban' => 'required|string',
            'xp' => 'required|numeric|min:0',
        ]);

        $latihan_pdf->update($validated);

        return redirect()->route('latihan_pdf.index')->with('success', 'Soal berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatihanPdf $latihan_pdf)
    {
        $latihan_pdf->delete();
        return redirect()->route('latihan_pdf.index')->with('success', 'Soal latihan berhasil dihapus');
    }
}
