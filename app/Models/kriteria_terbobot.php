<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class kriteria_terbobot extends Model
{
    use Loggable;
    protected $guarded = [];

    protected $table = 'kriteria_terbobots';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'kode', 'criteria_id', 'total', 'average'
    ];
}
