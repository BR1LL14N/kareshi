<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'email',
        'is_banned',
        'role',
        'password',
        'profile_picture',
        'phone',
        'asal',
        'umur',
        'latar_belakang',
        'created_at',
        'updated_at',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class);
    }

    // Relasi sebagai Talent (rental di mana user menjadi talent)
    public function rentalSebagaiTalent()
    {
        return $this->hasMany(Rental::class, 'talent_id');
    }

    // Jika User bisa menjadi Talent dan memiliki banyak Layanan
    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'talent_id');
    }

    // Fungsi bantu
    public function isTalent()
    {
        return $this->role === 'talent';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    public function isBanned()
    {
        return $this->is_banned;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_banned' => 'boolean',
        ];
    }
}
