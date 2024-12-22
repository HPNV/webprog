<?php
// app/Models/Hotel.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $primaryKey = 'hotelId';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['hotelId', 'name', 'address', 'email', 'phone'];

    public function places()
    {
        return $this->belongsToMany(Place::class, 'placeHotels', 'placeId', 'hotelId');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'hotelRooms', 'hotelId', 'roomId');
    }

    public function books()
    {
        return $this->hasMany(Book::class, 'hotelId');
    }
}
