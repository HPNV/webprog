<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $primaryKey = 'placeId';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'placeId',
        'name',
        'imagePath',
        'galleryImages',
        'address',
        'description',
        'email',
        'phone',
    ];

    protected $casts = [
        'galleryImages' => 'array',
    ];


    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'placeHotels', 'placeId', 'hotelId');
    }
}

