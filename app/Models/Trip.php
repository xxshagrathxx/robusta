<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $via_city_ids = [
        'via_city_ids' => 'array'
    ];

    public function fromCity()
    {
        return $this->belongsTo(Station::class, 'from_city_id', 'id');
    }

    public function toCity()
    {
        return $this->belongsTo(Station::class, 'to_city_id', 'id');
    }

    public function viaCities() 
    {
        return $this->hasMany(Station::class, 'id', 'via_city_ids');
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }
}
