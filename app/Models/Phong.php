<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;
    protected $table = 'phong';
    protected $primaryKey = 'id_phong';
    protected $fillable =
    [
        'ten_phong',
        'id_loai_phong',
        'id_co_so',
        'id_tang',
        'id_toa_nha',
        'created_at',
        'updated_at'
    ];
}