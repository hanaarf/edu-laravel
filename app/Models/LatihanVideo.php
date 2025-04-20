<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatihanVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_video_id',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban'
    ];

    public function materiVideo()
    {
        return $this->belongsTo(MateriVideo::class, 'materi_video_id');
    }
}
