<?php

namespace App\Helper;

use App\Models\User;
use Carbon\Carbon;

class FormatHelper {
    public static function formatResultAuth($user) {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role,
            'created_at' => Carbon::parse( $user->created_at)->translatedFormat('D F Y'),
            'updated_at' => Carbon::parse($user->updated_at)->translatedFormat('D F Y'),
        ];
    }

    public static function resultUser($id_user) {
        $user = User::where('id', $id_user)
        ->get()
        ->map(function ($user) {
            return FormatHelper::formatResultAuth($user);
        });
        return $user;
    }
}