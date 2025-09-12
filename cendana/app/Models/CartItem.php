<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class CartItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_item';
    protected $fillable = ['id_keranjang', 'id_produk', 'jumlah', 'harga_satuan'];
    protected $casts = ['harga_satuan' => 'decimal:2'];

    public function cart() { return $this->belongsTo(Cart::class, 'id_keranjang', 'id_keranjang'); }
    public function product() { return $this->belongsTo(Product::class, 'id_produk', 'id_produk'); }
}