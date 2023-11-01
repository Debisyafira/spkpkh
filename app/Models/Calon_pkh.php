<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon_pkh extends Model
{
    use HasFactory;
    protected $table = 'calon_pkhs';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nik', 'nama', 'alamat'
    ];
}
