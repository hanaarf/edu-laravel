<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function indexL(){
        $ulasan = Ulasan::with('user')
            ->whereHas('user', function($q) {
                $q->whereIn('name', ['hana aulia', 'maliha', 'intan']);
            })
            ->latest()
            ->limit(5)
            ->get();
        return view('landingPage', compact('ulasan'));
    }

    public function index(){
        $user = Ulasan::all();
        return view('testimoni', compact('user'));
    }
}