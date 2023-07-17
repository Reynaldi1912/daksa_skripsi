<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatFasilitas extends Model
{
    use HasFactory;
    protected $table = 'tempat_fasilitas';
    protected $fillable = [
        'id_tempat',
        'id_fasilitas',
    ];
}
