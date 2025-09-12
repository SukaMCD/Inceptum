<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // PENTING: Beri tahu Laravel primary key Anda bukan 'id'
    protected $primaryKey = 'id_kategori';
    protected $table = 'categories';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];
}