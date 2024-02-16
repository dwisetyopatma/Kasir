<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table= "pelanggan";

    protected $primaryKey = 'PelangganID';
    protected $fillable = ['PelangganID', 'NamaPelanggan', 'Alamat', 'NomorTelepon'];

    public function Penjualan()
    {
        return $this->hasMany(Penjualan::class, 'PelangganID', 'PelangganID');
    }
}
