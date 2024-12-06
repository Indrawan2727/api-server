<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    protected $fillable = [
        'user_id' ,'name', 'hp','lokasi','lat','long', 'kategori', 'deskripsi', 'image','status', 'petugas'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
