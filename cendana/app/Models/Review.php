<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ulasan';
    protected $fillable = ['id_user', 'id_produk', 'rating', 'komentar']; // Asumsi ada id_produk juga
    
    public function user() { return $this->belongsTo(User::class, 'id_user', 'id_user'); }
    // Jika ulasan terkait produk, tambahkan relasi ini:
    // public function product() { return $this->belongsTo(Product::class, 'id_produk', 'id_produk'); }
}