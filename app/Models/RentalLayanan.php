<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalLayanan extends Model
{
    protected $table = 'rental_layanan';

    protected $fillable = [
        'rental_id',
        'layanan_talent_id',
        'harga',
        'created_at',
        'updated_at'
    ];

    // Relasi ke Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }

    // Relasi ke LayananTalent
    public function layananTalent()
    {
        return $this->belongsTo(LayananTalent::class, 'layanan_talent_id');
    }
}
