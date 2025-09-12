<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // <-- Import ini

class Product extends Model
{
    use HasFactory;

    // PENTING: Beri tahu Laravel primary key Anda bukan 'id'
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];

    // PENTING: Ini adalah definisi relasi yang digunakan Filament
    public function category(): BelongsTo
    {
        // format: belongsTo(ModelTujuan::class, 'foreign_key_di_tabel_ini', 'primary_key_di_tabel_tujuan')
        return $this->belongsTo(Category::class, 'id_kategori', 'id_kategori');
    }
}