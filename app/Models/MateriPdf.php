<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriPdf extends Model
{
    use HasFactory;

    protected $table = 'materi_pdfs';

    protected $fillable = [
        'jenjang_id', 'kelas_id', 'judul', 'deskripsi', 'file_url'
    ];

    public function jenjang()
    {
        return $this->belongsTo(Jenjang::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function latihanPdf()
    {
        return $this->hasMany(LatihanPdf::class);
    }

    public function progressMateriPdf()
    {
        return $this->hasMany(ProgressMateriPdf::class);
    }
}
