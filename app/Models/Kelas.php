<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['jenjang_id', 'nama'];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function siswaProfiles()
    {
        return $this->hasMany(SiswaProfile::class);
    }
}
