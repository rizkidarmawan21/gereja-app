<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Capacity extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
