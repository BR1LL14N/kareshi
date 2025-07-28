<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananTalent extends Model
{
    protected $table = 'layanan_talent';

    protected $fillable = [
        'talent_id',
        'layanan_id',
        'harga',
        'created_at',
        'updated_at'
    ];

    // Relasi ke Talent
    public function talent()
    {
        return $this->belongsTo(Talent::class, 'talent_id');
    }

    // Relasi ke Layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');    
    }
}
