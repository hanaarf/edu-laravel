<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilLatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'soal_id', 
        'jawaban_user', 
        'benar', 
        'nilai'
    ];

    public function soal()
    {
        return $this->belongsTo(LatihanSoal::class, 'soal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
