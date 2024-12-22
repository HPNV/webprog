<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $primaryKey = 'roomId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'roomId',
        'name',
        'type',
        'price',
    ];

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotelRooms', 'hotelId', 'roomId');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'roomId');
    }
}
