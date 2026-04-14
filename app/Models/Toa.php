<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toa extends Model
{
    protected $table = 'toa_nha';
    protected $primaryKey = 'id_toa_nha';
    protected $fillable =
    [
        'ten_toa_nha',
        'id_co_so',
        'created_at',
        'updated_at'
    ];
    public function tangs()
    {
        return $this->hasMany(Toa::class, 'id_toa_nha');
    }
    public function co_so()
    {
        return $this->belongsTo(Coso::class, 'id_co_so');
    }
}