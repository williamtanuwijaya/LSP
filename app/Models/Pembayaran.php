<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Relasi Asli (Standard Naming)
     * Pembayaran milik satu Calon Mahasiswa
     */
    public function calonMahasiswa()
    {
        return $this->belongsTo(CalonMahasiswa::class);
    }

    /**
     * PENYEBAB ERROR ANDA:
     * Laravel mencari fungsi bernama 'pendaftar', tapi tidak menemukannya.
     * Kita buatkan fungsi 'pendaftar' yang isinya sama dengan 'calonMahasiswa'.
     */
    public function pendaftar()
    {
        // Parameter kedua 'calon_mahasiswa_id' wajib ditulis karena nama fungsinya beda dengan nama tabel
        return $this->belongsTo(CalonMahasiswa::class, 'calon_mahasiswa_id');
    }
}
