<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria_terbobot extends Model
{
    protected $guarded = [];

    protected $table = 'kriteria_terbobots';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'kode', 'criteria_id', 'total', 'average'
    ];
}
