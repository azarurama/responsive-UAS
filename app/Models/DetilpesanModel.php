<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetilpesanModel extends Model
{
    use HasFactory;

    protected $table = 'detil_pesan';

    protected $fillable = [
        'id_pesan', 'id_produk', 'jumlah', 'harga'
    ];
}