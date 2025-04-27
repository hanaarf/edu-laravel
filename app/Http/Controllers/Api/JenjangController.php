<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JenjangController extends Controller
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

    public function getJenjang()
    {
        $jenjang = Jenjang::all();
        
        return response()->json([
            'success' => true,
            'data' => $jenjang,
        ]);
    }

    // Method untuk mengambil Kelas berdasarkan Jenjang
    public function getKelasByJenjang($jenjang_id)
    {
        $kelas = Kelas::where('jenjang_id', $jenjang_id)->get();

        return response()->json([
            'success' => true,
            'data' => $kelas,
        ]);
    }
}
