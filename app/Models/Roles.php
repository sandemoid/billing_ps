<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'id_roles';
    protected $fillable = ['name_role'];

    // Tidak menggunakan kolom created_at dan updated_at
    public $timestamps = false;
}
