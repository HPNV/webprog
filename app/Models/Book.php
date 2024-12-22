<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'bookId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'bookId',
        'hotelId',
        'roomId',
        'userId',
        'checkIn',
        'checkOut',
        'totalPrice',
    ];

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
