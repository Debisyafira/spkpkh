<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkriteria extends Model
{
    use HasFactory;
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
}
