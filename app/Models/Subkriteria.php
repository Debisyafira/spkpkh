<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory, Loggable;
    // table name = subkriteria
    protected $table = 'subkriteria';
    protected $fillable = [
        'name',
        'nilai',
        'criteria_id',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function pkhs()
    {
        return $this->belongsToMany(Calon_pkh::class, 'pkh_sub_criteria')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function pkhSubs()
    {
        return $this->hasMany(PkhCriteria::class);
    }
}
