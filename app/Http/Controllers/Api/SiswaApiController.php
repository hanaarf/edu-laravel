<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiswaProfile;
use Illuminate\Http\Request;

class SiswaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function updateMenit(Request $request)
    {
        $request->validate([
            'menit' => 'required|integer|min:1|max:300',
        ]);

        $profile = SiswaProfile::where('user_id', $request->user()->id)->first();

        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Profil siswa tidak ditemukan',
            ], 404);
        }

        $profile->belajar_menit_per_hari = $request->menit;
        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Waktu belajar berhasil diperbarui',
            'data' => $profile,
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenjang_id' => 'required|exists:jenjang,id',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = $request->user();
        $user->name = $request->name;
        $user->save();

        $profile = SiswaProfile::firstOrCreate(['user_id' => $user->id]);
        $profile->jenjang_id = $request->jenjang_id;
        $profile->kelas_id = $request->kelas_id;
        $profile->save();

        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui',
            'data' => [
                'user' => $user,
                'profile' => $profile,
            ]
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|string|in:ava1.png,ava2.png,ava3.png,ava4.png,ava5.png,ava6.png',
        ]);

        $user = $request->user();
        $user->image = $request->avatar;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Avatar berhasil diperbarui.',
            'image' => $user->image,
        ]);
    }
}
