<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegIbadah extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function capacities()
    {
        return $this->belongsTo(Capacity::class,'capacity_id','id');
    }
    
}
