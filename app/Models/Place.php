<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    // Specify the primary key
    protected $primaryKey = 'placeId';

    // Set the key type to string for UUIDs
    protected $keyType = 'string';

    // Prevent Eloquent from assuming the primary key is auto-incrementing
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
}

