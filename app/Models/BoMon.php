<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoMon extends Model
{
    use HasFactory;
    protected $table = 'bo_mon';
    protected $primaryKey = 'id_bo_mon';
    protected $fillable =
    [
        'ten_bo_mon',
    ];
}
