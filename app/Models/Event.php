<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function capacities()
    {
        return $this->hasMany(Capacity::class,'event_id','id');
    }

    // public function RegIbadah()
    // {
    //     return $this->hasMany(RegIbadah::class,'event_id','id');
    // }
}
