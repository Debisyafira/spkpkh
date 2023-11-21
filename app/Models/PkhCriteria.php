<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PkhCriteria extends Model
{
    use HasFactory;
    protected $table = 'pkh_criterias';
    protected $fillable = [
        'pkh_id',
        'sub_criteria_id',
        'value',
    ];

    public function pkh()
    {
        return $this->belongsTo(Pkh::class);
    }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class);
    }
}
