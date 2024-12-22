<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'userId';

    // Tentukan bahwa 'userId' adalah UUID dan bukan auto-increment
    public $incrementing = false;

    // Tentukan tipe primary key sebagai string (UUID)
    protected $keyType = 'string';

    // Daftar kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Kolom yang tidak akan ditampilkan ketika mengambil data
    protected $hidden = [
        'password',
    ];

    // Menghasilkan UUID secara otomatis saat membuat model baru
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->userId = (string) Str::uuid(); // Generate UUID
        });
    }
}
