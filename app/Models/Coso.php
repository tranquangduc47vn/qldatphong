<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coso extends Model
{
    protected $table = 'co_so';
    protected $primaryKey = 'id_co_so';
    protected $fillable =
    [
        'ten_co_so',
        'dia_chi',
        'created_at',
        'updated_at'
    ];
    public function toas()
    {
        return $this->hasMany(Toa::class, 'id_co_so');
    }
}