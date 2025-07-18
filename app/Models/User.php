<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'role',
        'image',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function siswaProfile()
    {
        return $this->hasOne(SiswaProfile::class);
    }

    public function progressMateriVideo()
    {
        return $this->hasMany(ProgressMateriVideo::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function jawabanLatihan()
    {
        return $this->hasMany(JawabanLatihanVideo::class);
    }

    public function followers()
    {
        // User yang mengikuti saya
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    public function following()
    {
        // User yang saya ikuti
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }
}
