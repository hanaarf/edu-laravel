<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JawabanLatihanVideo;
use App\Models\LatihanVideo;
use App\Models\MateriVideo;
use App\Models\SiswaProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function showUser($id)
    {
        $user = User::with('siswaProfile')->find($id);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        return response()->json([
            'id' => $user->id,
            'nama' => $user->name,
            'xp' => $user->siswaProfile->xp_total ?? 0,
            'img' => $user->image ?? 'ava1.png',
            'bio' => $user->bio,
            'jenjang' => $user->siswaProfile->jenjang->nama ?? '',
            'kelas' => $user->siswaProfile->kelas->nama ?? '',
        ]);
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

    public function searchUser(Request $request)
    {
        $keyword = $request->query('q');

        $profile = SiswaProfile::where('user_id', $request->user()->id)->first();
        if (!$profile) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        }

        $users = User::where('name', 'like', "%$keyword%")
            ->where('id', '!=', $request->user()->id)
            ->whereHas('siswaProfile', function ($query) use ($profile) {
                $query->where('jenjang_id', $profile->jenjang_id);
            })
            ->with(['siswaProfile.jenjang', 'siswaProfile.kelas'])
            ->get()
            ->map(function ($user) {
                return [
                    'id' => $user->id,
                    'nama' => $user->name,
                    'xp' => $user->siswaProfile->xp_total ?? 0,
                    'img' => $user->image ?? 'ava1.png',
                    'jenjang' => $user->siswaProfile->jenjang->nama ?? 'Unknown',
                    'kelas' => $user->siswaProfile->kelas->nama ?? 'Unknown',
                    'created_at' => $user->created_at->toDateString(),
                ];
            });

        return response()->json($users);
    }

    public function leaderboard(Request $request)
    {
        $user = $request->user();
        $profile = $user->siswaProfile;

        $users = User::with(['siswaProfile.jenjang', 'siswaProfile.kelas'])
            ->whereHas('siswaProfile', function ($query) use ($profile) {
                $query->where('jenjang_id', $profile->jenjang_id)
                      ->where('kelas_id', $profile->kelas_id);
            })
            ->get()
            ->sortByDesc(fn($user) => $user->siswaProfile->xp_total ?? 0)
            ->take(5)
            ->values()
            ->map(function ($user, $index) {
                return [
                    'id' => $user->id,
                    'rank' => $index + 1,
                    'name' => $user->name,
                    'xp' => $user->siswaProfile->xp_total ?? 0,
                    'avatar' => $user->image ?? 'avatar.png',
                    'jenjang' => $user->siswaProfile->jenjang->nama ?? '-',
                    'kelas' => $user->siswaProfile->kelas->nama ?? '-',
                    'created_at' => $user->created_at->toDateString(),
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $users,
        ]);
    }

    public function latihanMateri(Request $request)
    {
        $user = $request->user();
        $profile = $user->siswaProfile;

        $materi = MateriVideo::with('latihanVideo')
            ->where('jenjang_id', $profile->jenjang_id)
            ->where('kelas_id', $profile->kelas_id)
            ->get();

        $result = $materi->map(function ($item) use ($user) {
            $soalIds = $item->latihanVideo->pluck('id');
            $jumlahSoal = $soalIds->count();
            $jumlahJawab = JawabanLatihanVideo::where('user_id', $user->id)
                ->whereIn('latihan_video_id', $soalIds)
                ->count();
            if ($jumlahSoal == 0) {
                $status = 'belum'; // Tidak ada soal
            } elseif ($jumlahJawab == 0) {
                $status = 'belum'; // Belum mulai
            } elseif ($jumlahJawab < $jumlahSoal) {
                $status = 'lanjut'; // Sudah mulai, belum selesai
            } else {
                $status = 'selesai'; // Sudah selesai semua
            }

            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'subjudul' => $item->subjudul,
                'deskripsi' => $item->deskripsi,
                'youtube_url' => $item->youtube_url,
                'jumlah_soal' => $jumlahSoal ?? 0,
                'jumlah_jawab' => $jumlahJawab ?? 0,
                'status_latihan' => $status,
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $result
        ]);
    }

    public function latihanSoal(Request $request, $materi_id)
    {
        $user = $request->user(); 

        $soal = LatihanVideo::where('materi_video_id', $materi_id)->get();
        $jawabanUser = JawabanLatihanVideo::where('user_id', $user->id)->pluck('latihan_video_id')->toArray();

        $data = $soal->map(function ($item) use ($jawabanUser) {
            return [
                'id' => $item->id,
                'pertanyaan' => $item->pertanyaan,
                'opsi_a' => $item->opsi_a,
                'opsi_b' => $item->opsi_b,
                'opsi_c' => $item->opsi_c,
                'jawaban' => $item->jawaban,
                'xp' => $item->xp,
                'sudah_dijawab' => in_array($item->id, $jawabanUser),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    public function simpanJawaban(Request $request)
    {
        $request->validate([
            'latihan_video_id' => 'required|exists:latihan_videos,id',
            'jawaban_user' => 'required|string',
        ]);

        $user = $request->user();
        $soal = LatihanVideo::findOrFail($request->latihan_video_id);

        $isBenar = strtolower(trim($request->jawaban_user)) === strtolower(trim($soal->jawaban));

        JawabanLatihanVideo::create([
            'user_id' => $user->id,
            'latihan_video_id' => $soal->id,
            'jawaban_user' => $request->jawaban_user,
            'is_benar' => $isBenar,
        ]);

        if ($isBenar) {
            $user->siswaProfile->increment('xp_total', $soal->xp);
        }

        return response()->json([
            'success' => true,
            'message' => 'Jawaban disimpan',
            'is_benar' => $isBenar,
            'xp_didapat' => $isBenar ? $soal->xp : 0,
        ]);
    }
}
