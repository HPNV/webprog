<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'userId';

    // Indicate that 'userId' is UUID and not auto-incrementing
    public $incrementing = false;

    // Specify the primary key type as string (UUID)
    protected $keyType = 'string';

    // Mass-assignable attributes
    protected $fillable = [
        'name',
        'email',
    ];

    // Hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Automatically generate UUID when creating a new user
    protected static function booted()
    {
        static::creating(function ($user) {
            $user->userId = (string) Str::uuid();
        });
    }

    /**
     * Hash the password when it is set.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
