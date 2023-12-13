<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory, Loggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'code', 'type'
    ];

    public static function getIdfromName($name)
    {
        $data = Criteria::where('name', '=', $name)->first();

        return $data->id;
    }

    public function subCriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }

    // public function ahp()
    // {
    //     return $this->belongsTo(Criteria::class, 'criteria_id');
    // }
}
