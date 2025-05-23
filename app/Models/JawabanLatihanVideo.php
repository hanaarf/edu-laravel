<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanLatihanVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latihan_video_id',
        'jawaban_user',
        'is_benar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soal()
    {
        return $this->belongsTo(LatihanVideo::class, 'latihan_video_id');
    }
//
}
