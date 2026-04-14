<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tang extends Model
{
    protected $table = 'tang';
    protected $primaryKey = 'id_tang';
    protected $fillable =
    [
        'ten_tang',
        'id_toa_nha',
        'created_at',
        'updated_at'

    ];

    public function toa()
    {
        return $this->belongsTo(Toa::class, 'id_toa_nha');
    }
}