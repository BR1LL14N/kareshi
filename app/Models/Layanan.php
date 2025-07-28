<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'nama_layanan',
        'deskripsi',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the validation rules for the model.
     *
     * @return array<string, string>
     */
    // public static function rules(): array
    // {
    //     return [
    //         'nama_layanan' => 'required|string|max:255',
    //         'deskripsi' => 'nullable|string',
    //     ];
    // }
}
