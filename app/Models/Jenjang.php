<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;

    protected $table = 'jenjang';

    protected $fillable = ['nama'];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswaProfiles()
    {
        return $this->hasMany(SiswaProfile::class);
    }
}
