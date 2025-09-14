<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Import ini

class Articles extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'status',
        'thumbnail',
    ];
}