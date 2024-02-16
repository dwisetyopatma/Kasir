<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table= "detailpenjualan";

    protected $primaryKey = 'DetailID';
    protected $fillable = ['DetailID', 'PenjualanID', 'ProdukID', 'JumlahProduk', 'Subtotal'];

    public function Produk() {
        return $this->belongsTo(Produk::class, 'ProdukID', 'ProdukID');
    }

    public function Penjualan() {
        return $this->belongsTo(Penjualan::class, 'PenjualanID', 'PenjualanID');
    }
}
