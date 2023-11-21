<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ahp extends Model
{
    use HasFactory;
    protected $table = 'ahps';
    protected $fillable = [
        'id',
        'criteria_id',
        'total_eigen',
        'average_eigen'
    ];
    public function criteria() {
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }
}
