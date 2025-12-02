<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumuman'; // Karena nama tabel singular
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
