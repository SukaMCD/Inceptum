<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_keranjang';
    protected $fillable = ['id_user'];

    public function user() { return $this->belongsTo(User::class, 'id_user', 'id_user'); }
    public function items() { return $this->hasMany(CartItem::class, 'id_keranjang', 'id_keranjang'); }
}