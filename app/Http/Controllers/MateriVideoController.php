<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\MateriVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MateriVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = MateriVideo::all();
        return view('dashboard.materiVideo.index', compact('videos'));
    }

    public function filterByKelas($kelas_id)
    {
        $videos = MateriVideo::where('kelas_id', $kelas_id)->get();
        return view('dashboard.materiVideo.index', compact('videos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.materiVideo.create', compact('jenjangs', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'nullable',
            'youtube_url' => 'required',
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $embedLink = $this->convertToEmbedLink($request->youtube_url);

        MateriVideo::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'youtube_url' => $embedLink,
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('materi_video.index')->with('success', 'Video added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(MateriVideo $materi_video)
    {
        return view('dashboard.materiVideo.show', compact('materi_video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MateriVideo $materi_video)
    {
        $jenjangs = Jenjang::all();
        $kelas = Kelas::all();
        return view('dashboard.materiVideo.edit', compact('materi_video', 'jenjangs', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MateriVideo $materi_video)
    {
        $request->validate([
            'judul' => 'required',
            'subjudul' => 'required',
            'deskripsi' => 'nullable',
            'youtube_url' => 'required',
            'jenjang_id' => 'required',
            'kelas_id' => 'required',
        ]);

        $youtubeUrl = $request->youtube_url;

        if (!Str::contains($youtubeUrl, 'youtube.com/embed')) {
            $youtubeUrl = $this->convertToEmbedLink($youtubeUrl);
        }

        $materi_video->update([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'deskripsi' => $request->deskripsi,
            'youtube_url' => $youtubeUrl,
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->route('materi_video.index')->with('success', 'Video updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
   

    private function convertToEmbedLink($link)
    {
        preg_match('/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([^\?]*)|youtube\.com\/.*v=([^\&]*)/', $link, $matches);
        $videoId = $matches[1] ?? $matches[2] ?? null;

        if ($videoId) {
            return "https://www.youtube.com/embed/{$videoId}";
        }

        return $link;
    }
    public function getKelas($jenjang_id)
    {
        $kelas = Kelas::where('jenjang_id', $jenjang_id)->get();
        return response()->json($kelas);
    }
}
