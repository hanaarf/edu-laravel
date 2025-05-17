<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriVideo;
use App\Models\SiswaProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MateriApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $userId = $user->id;
        $siswaProfile = SiswaProfile::where('user_id', $userId)->first();

        if (!$siswaProfile) {
            return response()->json([
                'success' => false,
                'message' => 'User profile not found',
            ], 404);
        }

        $materi = MateriVideo::where('jenjang_id', $siswaProfile->jenjang_id)
            ->where('kelas_id', $siswaProfile->kelas_id)
            ->get();

        $materi = $materi->map(function ($materi) {
            return [
                'id' => $materi->id,
                'judul' => $materi->judul,
                'deskripsi' => $materi->deskripsi,
                'youtube_url' => $materi->youtube_url,
                'created_at' => $materi->created_at->format('Y-m-d H:i:s'),
            ];
        });


        return response()->json([
            'success' => true,
            'message' => 'List materi video',
            'data' => $materi,
        ]);
    }

    public function indexLimit(Request $request)
    {
        $user = $request->user();
        $userId = $user->id;
        $siswaProfile = SiswaProfile::where('user_id', $userId)->first();

        if (!$siswaProfile) {
            return response()->json([
                'success' => false,
                'message' => 'User profile not found',
            ], 404);
        }

        $materi = MateriVideo::where('jenjang_id', $siswaProfile->jenjang_id)
            ->where('kelas_id', $siswaProfile->kelas_id)
            ->inRandomOrder()     // ✅ ambil random
            ->limit(4)            // ✅ batasi 4
            ->get();

        $materi = $materi->map(function ($materi) {
            return [
                'id' => $materi->id,
                'judul' => $materi->judul,
                'deskripsi' => $materi->deskripsi,
                'youtube_url' => $materi->youtube_url,
                'created_at' => $materi->created_at->format('Y-m-d H:i:s'),
            ];
        });


        return response()->json([
            'success' => true,
            'message' => 'List materi video',
            'data' => $materi,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = MateriVideo::with(['jenjang', 'kelas'])->find($id);

        if (!$materi) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'id' => $materi->id,
                'judul' => $materi->judul,
                'deskripsi' => $materi->deskripsi,
                'youtube_url' => $materi->youtube_url,
                'jenjang' => $materi->jenjang->nama ?? '-',
                'kelas' => $materi->kelas->nama ?? '-',
                'created_at' => $materi->created_at->format('Y-m-d H:i:s'),
            ],
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        
    }

  
    public function search(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated',
            ], 401);
        }

        $keyword = trim($request->query('keyword'));
        if (!$keyword) {
            return response()->json([
                'success' => false,
                'message' => 'Kata kunci wajib diisi',
            ], 400);
        }

        $profile = SiswaProfile::where('user_id', $user->id)->first();
        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profil siswa tidak ditemukan',
            ], 404);
        }

        // Cari materi berdasarkan jenjang, kelas, dan judul (case-insensitive)
        $materi = MateriVideo::where('jenjang_id', $profile->jenjang_id)
            ->where('kelas_id', $profile->kelas_id)
            ->whereRaw('LOWER(judul) LIKE ?', ['%' . strtolower($keyword) . '%'])
            ->get();

        if ($materi->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Materi tidak ditemukan untuk keyword "' . $keyword . '"',
            ]);
        }

        $materi = $materi->map(function ($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'deskripsi' => $item->deskripsi,
                'youtube_url' => $item->youtube_url,
                'created_at' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Hasil pencarian materi video (khusus jenjang & kelas kamu)',
            'data' => $materi,
        ]);
    }
}
