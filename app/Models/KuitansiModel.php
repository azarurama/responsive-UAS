<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuitansiModel extends Model
{
    use HasFactory;

    protected $table = 'kuitansi';

    protected $fillable = [
        'id_faktur', 'tgl_kuitansi'
    ];
}