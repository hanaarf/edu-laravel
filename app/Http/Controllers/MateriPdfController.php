<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\MateriPdf;
use Illuminate\Http\Request;

class MateriPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pdfs = MateriPdf::all();
        return view('dashboard.materiPdf.index', compact('pdfs'));
    }

    public function filterByKelas($kelas_id)
    {
        $pdfs = MateriPdf::where('kelas_id', $kelas_id)->get();
        return view('dashboard.materiPdf.index', compact('pdfs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.materiPdf.create', compact('jenjangs', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file_url' => 'required|mimes:pdf|max:10240',
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $filePath = $request->file('file_url')->store('materi_pdf', 'public');

        MateriPdf::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file_url' => $filePath,
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('materi_pdf.index')->with('success', 'Materi PDF berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(MateriPdf $materi_pdf)
    {
        return view('dashboard.materiPdf.show', compact('materi_pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MateriPdf $materi_pdf)
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.materiPdf.edit', compact('materi_pdf', 'jenjangs', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MateriPdf $materi_pdf)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'nullable',
            'file_url' => 'nullable|mimes:pdf|max:10240',
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
        ]);

        if ($request->hasFile('file_url')) {
            if ($materi_pdf->file_url) {
                $oldPath = public_path('storage/' . $materi_pdf->file_url);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $filePath = $request->file('file_url')->store('materi_pdf', 'public');
            $materi_pdf->file_url = $filePath;
        }

        $materi_pdf->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
            'file_url' => $materi_pdf->file_url,
        ]);

        return redirect()->route('materi_pdf.index')->with('success', 'Materi PDF berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MateriPdf $materi_pdf)
    {
        $materi_pdf->delete();
        return redirect()->route('materi_pdf.index')->with('success', 'Video deleted successfully');
    }
}
