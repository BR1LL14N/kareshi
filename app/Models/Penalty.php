<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penalty extends Model
{
    protected $fillable = [
        'user_id',
        'rental_id',
        'alasan',
        'notes',
        'status',
        'ajukan_banding',
        'alasan_banding',
        'created_at',
        'updated_at'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }
}
