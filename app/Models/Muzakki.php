<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    protected $table = 'muzakki';
    protected $fillable =  [
        'nama',
        'alamat',
        'no_hp',
        'jml_tanggungan'
    ];

    protected $hidden = [];
}
