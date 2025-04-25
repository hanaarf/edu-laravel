<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressMateriVideo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'materivideo_id', 'status', 'waktu_selesai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materiVideo()
    {
        return $this->belongsTo(MateriVideo::class);
    }
}
