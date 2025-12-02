<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'nisn',
        'asal_sekolah',
        'nomor_hp',
        'alamat',
        'prodi_pilihan',
        'status_pendaftaran',
    ];


    // Relasi ke User (Untuk ambil Nama/Email)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Pembayaran (Untuk cek status bayar)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
