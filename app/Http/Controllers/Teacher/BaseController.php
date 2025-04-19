<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index()
    {
        $admin = User::where('role', '1')->count();
        $teacher = User::where('role', '2')->count();
        $student = User::where('role', '3')->count();
        return view('dashboard.base', compact('admin', 'teacher', 'student'));
    }
}
