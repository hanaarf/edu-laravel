<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\LatihanVideo;
use App\Models\MateriVideo;
use Illuminate\Http\Request;

class LatihanVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soals = LatihanVideo::all();
        return view('dashboard.latVideo.index', compact('soals'));
    }

    public function filter($kelas)
    {
        $materiVideos = MateriVideo::where('kelas_id', $kelas)->get();
        $soals = LatihanVideo::whereIn('materi_video_id', $materiVideos->pluck('id'))->get();
        return view('dashboard.latVideo.index', compact('soals'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        return view('dashboard.latVideo.create', compact('jenjangs'));
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

    public function getMateriVideo($kelas_id)
    {
        $materi = MateriVideo::where('kelas_id', $kelas_id)->get();
        return response()->json($materi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_video_id' => 'required',
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

        $materi_video_id = $request->materi_video_id;

        // Proses penyimpanan setiap soal
        foreach ($request->pertanyaan as $key => $pertanyaan) {
            LatihanVideo::create([
                'materi_video_id' => $materi_video_id,
                'pertanyaan' => $pertanyaan,
                'opsi_a' => $request->opsi_a[$key],
                'opsi_b' => $request->opsi_b[$key],
                'opsi_c' => $request->opsi_c[$key],
                'opsi_d' => $request->opsi_d[$key],
                'jawaban' => $request->jawaban[$key],
                'xp' => $request->xp[$key],
            ]);
        }

        return redirect()->route('latihan_video.index')->with('success', 'Soal latihan berhasil ditambahkan');
    }




    /**
     * Display the specified resource.
     */
    public function show(LatihanVideo $latihan_video)
    {
        return view('dashboard.latVideo.show', compact('latihanSoal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LatihanVideo $latihan_video)
    {
        $jenjangs = Jenjang::all();
        return view('dashboard.latVideo.edit', compact('latihan_video', 'jenjangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LatihanVideo $latihan_video)
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

        $latihan_video->update($validated);

        return redirect()->route('latihan_video.index')->with('success', 'Soal berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LatihanVideo $latihan_video)
    {
        $latihan_video->delete();
        return redirect()->route('latihan_video.index')->with('success', 'Soal latihan berhasil dihapus');
    }
}
