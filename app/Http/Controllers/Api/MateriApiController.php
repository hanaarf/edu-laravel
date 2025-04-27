<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MateriVideo;
use App\Models\SiswaProfile;
use Illuminate\Http\Request;

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

        // Kembalikan data materi sebagai response JSON
        return response()->json([
            'success' => true,
            'message' => 'List materi video',
            'data' => $materi,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
