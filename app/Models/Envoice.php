<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Envoice extends Model
{
    protected $fillable = [
        'rental_id',
        'total',
        'payment_method',
        'payment_status',
        'paid_at',
        'note',
        'external_reference',
        'created_at',
        'updated_at'
    ];
    
    // Relasi ke Rental
    public function rental()
    {
        return $this->belongsTo(Rental::class, 'rental_id');
    }
}
