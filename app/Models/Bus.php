<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function trip() 
    {
        return $this->belongsTo(Trip::class, 'trip_id', 'id');
    }

    public function seats() 
    {
        return $this->hasMany(Seat::class);
    }
}
