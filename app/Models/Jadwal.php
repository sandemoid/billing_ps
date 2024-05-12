<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal_ps';

    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'hari',
        'waktu_buka',
        'waktu_tutup',
        'status',
    ];

    public $timestamps = true;
}
