<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatihanSoal extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenjang_id', 
        'kelas_id', 
        'pertanyaan', 
        'opsi_a', 
        'opsi_b', 
        'opsi_c', 
        'opsi_d', 
        'jawaban',
        'xp'
    ];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function hasilLatihan()
    {
        return $this->hasMany(HasilLatihan::class);
    }

}
