<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    //

    protected $fillable = [
       'name', 'image', 'deskripsi', 'jumlah'
    ];
}
