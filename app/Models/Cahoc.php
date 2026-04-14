<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cahoc extends Model
{
    protected $table = 'ca_hoc';
    protected $primaryKey = 'id_ca_hoc';
    protected $fillable =
    [
        'ten_ca_hoc',
        'loai_ca_hoc',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
    ];
}
