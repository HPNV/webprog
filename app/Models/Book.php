<?php
namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'bookId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'bookId',
        'placeId',
        'hotelId',
        'roomId',
        'userId',
        'checkIn',
        'checkOut',
    ];

    protected static function booted()
    {
        static::creating(function ($book) {
            $book->bookId = (string) Str::uuid(); // Generate a UUID for bookId
        });
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'placeId');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotelId');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
