<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $request->validate(['following_id' => 'required|exists:users,id']);

        $follower_id = Auth::id();
        $following_id = $request->following_id;

        if ($follower_id == $following_id) {
            return response()->json(['success' => false, 'message' => 'Tidak bisa follow diri sendiri'], 400);
        }

        $follow = Follow::firstOrCreate([
            'follower_id' => $follower_id,
            'following_id' => $following_id,
        ]);

        return response()->json(['success' => true, 'followed' => true]);
    }

    public function unfollow(Request $request)
    {
        $request->validate(['following_id' => 'required|exists:users,id']);

        $follower_id = Auth::id();
        $following_id = $request->following_id;

        $deleted = Follow::where('follower_id', $follower_id)
            ->where('following_id', $following_id)
            ->delete();

        return response()->json(['success' => true, 'followed' => false]);
    }

    public function isFollowing($userId)
    {
        $follower_id = Auth::id();
        $isFollowing = Follow::where('follower_id', $follower_id)
            ->where('following_id', $userId)
            ->exists();

        return response()->json(['success' => true, 'followed' => $isFollowing]);
    }

    // List followers user tertentu
    public function followers($user_id)
    {
        $user = User::findOrFail($user_id);
        return response()->json([
            'count' => $user->followers()->count(),
            'data' => $user->followers()
                ->select('users.id', 'users.name', 'users.image')
                ->get()
        ]);
    }

    // List following user tertentu
    public function following($user_id)
    {
        $user = User::findOrFail($user_id);
        return response()->json([
            'count' => $user->following()->count(),
            'data' => $user->following()
                ->select('users.id', 'users.name', 'users.image')
                ->get()
        ]);
    }

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
}
