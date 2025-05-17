<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiswaProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah.',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // password dan konfirmasi password
        ]);

        // Membuat user baru di tabel 'users'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => '3', // Default role 3 (siswa)
        ]);

        // Membuat token untuk user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Mengembalikan data user dan token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function completeRegistration(Request $request)
    {
        // Validasi data tambahan yang diterima
        $request->validate([
            'jenjang_id' => 'required|exists:jenjang,id',
            'kelas_id' => 'required|exists:kelas,id',
            'belajar_menit_per_hari' => 'required|integer',
        ]);

        // Ambil user yang sedang login (menggunakan token yang sudah diterima)
        $user = $request->user();

        // Menambahkan data ke tabel siswa_profiles
        $siswaProfile = SiswaProfile::create([
            'user_id' => $user->id,
            'jenjang_id' => $request->jenjang_id,
            'kelas_id' => $request->kelas_id,
            'belajar_menit_per_hari' => $request->belajar_menit_per_hari,
        ]);

        return response()->json([
            'message' => 'Registrasi lengkap.',
            'siswaProfile' => $siswaProfile,
        ], 200);
    }



    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil',
        ], 200);
    }

    public function getProfile(Request $request)
    {
        $user = $request->user();

        $profile = SiswaProfile::with(['jenjang', 'kelas'])
            ->where('user_id', $user->id)
            ->first();

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'bio' => $user->bio,
                'image' => $user->image,
                'jenjang' => $profile?->jenjang?->nama,
                'kelas' => $profile?->kelas?->nama,
                'belajar_menit_per_hari' => $profile?->belajar_menit_per_hari,
            ],
        ]);
    }
}
