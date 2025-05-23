<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriVideo extends Model
{
    use HasFactory;

    protected $table = 'materi_videos';

    protected $fillable = [
        'jenjang_id', 'kelas_id', 'judul', 'subjudul','deskripsi', 'youtube_url'
    ];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function latihanVideo()
    {
        return $this->hasMany(LatihanVideo::class);
    }
    
    public function progressMateriVideo()
    {
        return $this->hasMany(ProgressMateriVideo::class);
    }
}
