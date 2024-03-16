<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ps';
    protected $primaryKey = 'jadwal_id';
    protected $fillable = [
        'jadwal_id',
        'hari',
        'waktu_buka',
        'waktu_tutup',
        'created_at',
        'updated_at',
    ];
}
