<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calon_pkh extends Model
{
    use HasFactory, Loggable;
    protected $table = 'calon_pkhs';
    // protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
         'nama', 'alamat',
    ];

    public function subCriterias()
    {
        return $this->belongsToMany(Subkriteria::class, 'pkh_sub_criteria')
            ->withPivot(['value', 'subkriteria_id', 'criteria_id'])
            ->withTimestamps();
    }

    public function pkhSubs()
    {
        return $this->hasMany(PkhCriteria::class);
    }

    public function pkhSubcriteria()
    {
        return $this->hasManyThrough(PkhCriteria::class, Subkriteria::class, 'criteria_id', 'id');
    }
}
