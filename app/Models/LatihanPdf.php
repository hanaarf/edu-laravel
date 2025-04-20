<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LatihanPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_pdf_id',
        'pertanyaan',
        'opsi_a',
        'opsi_b',
        'opsi_c',
        'opsi_d',
        'jawaban'
    ];

    public function materiPdf()
    {
        return $this->belongsTo(MateriPdf::class, 'materi_pdf_id');
    }
}
