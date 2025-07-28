<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'talent_id',
        'status',
        'catatan_user',
        'catatan_talent',
        'jadwal_pertemuan',
        'lokasi_pertemuan',
        'total_harga',
        'created_at',
        'updated_at'
    ];

    // Relasi: Customer (User)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi: Talent (juga User)
    public function talent()
    {
        return $this->belongsTo(User::class, 'talent_id');
    }

    // Relasi ke penalty
    public function penalty()
    {
        return $this->hasOne(Penalty::class);
    }

    protected $casts = [
        'jadwal_pertemuan' => 'datetime',
        'total_harga' => 'decimal:2', // atau float
        'status' => 'boolean' // jika memang status bernilai true/false
    ];

    public function layanans()
    {
        return $this->belongsToMany(Layanan::class, 'rental_layanan');
    }

    // Jika Rental memiliki 1 Envoice
    public function envoice()
    {
        return $this->hasOne(Envoice::class);
    }
}
