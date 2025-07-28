<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    protected $fillable = [
        'user_id',
        'deskripsi',
        'status',
        'created_at',
        'updated_at'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Rental
    // public function rentals()
    // {
    //     return $this->hasMany(Rental::class, 'talent_id');
    // }

    // // Relasi ke LayananTalent
    // public function layananTalents()
    // {
    //     return $this->hasMany(LayananTalent::class, 'talent_id');
    // }

    
}
