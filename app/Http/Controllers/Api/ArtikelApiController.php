<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelApiController extends Controller
{
    public function index()
    {
        $artikels = Artikel::all()->map(function ($artikel) {
            // ganti nama key dari cover_artikel ke cover_image saja
            $artikel->cover_image = asset('storage/' . $artikel->cover_image);
            return $artikel;
        });
    
        return response()->json([
            'success' => true,
            'message' => 'List artikel',
            'data' => $artikels,
        ]);
    }
}
