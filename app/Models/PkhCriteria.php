<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkhCriteria extends Model
{
    use HasFactory, Loggable;
    protected $table = 'pkh_sub_criteria';
    protected $fillable = [
        'pkh_id',
        'subkriteria_id',
        'criteria_id',
        'value',
    ];

    public function pkh()
    {
        return $this->belongsTo(Calon_pkh::class);
    }

    public function subCriteria()
    {
        return $this->belongsTo(Subkriteria::class);
    }

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
