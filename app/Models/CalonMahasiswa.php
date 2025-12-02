<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonMahasiswa extends Model
{
    protected $guarded = [];

    // Relasi: Milik User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Punya data Pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
