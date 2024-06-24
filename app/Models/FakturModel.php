<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturModel extends Model
{
    use HasFactory;

    protected $table = 'faktur';

    protected $fillable = [
        'id_pesan', 'tgl_faktur'
    ];
}