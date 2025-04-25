<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'judul', 'deskripsi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function forumKomentar()
    {
        return $this->hasMany(ForumKomentar::class);
    }
}
