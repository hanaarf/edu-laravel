<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressMateriPdf extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'materipdf_id', 'status', 'waktu_selesai'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materiPdf()
    {
        return $this->belongsTo(MateriPdf::class);
    }
}
