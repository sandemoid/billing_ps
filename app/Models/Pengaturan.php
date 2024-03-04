<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table = 'pengaturan';

    protected $primaryKey = 'pengaturan_id';
    protected $fillable = [
        'key',
        'value',
    ];

    // Jika ingin menggunakan timestamp (created_at dan updated_at)
    public $timestamps = true;

    // Jika ingin mengabaikan kolom updated_at
    // public $timestamps = ['created_at'];
}
