<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'fakultas',
        'jurusan',
        'semester',
        'alamat',
        'no_hp',
        'foto',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}