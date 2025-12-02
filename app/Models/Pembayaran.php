<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $guarded = [];

    public function calonMahasiswa()
    {
        return $this->belongsTo(CalonMahasiswa::class);
    }
}
