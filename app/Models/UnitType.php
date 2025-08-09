<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitType extends Model
{
    protected $fillable = ['name', 'provider_id', 'description'];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
      public function provider()
    {
        return $this->belongsTo(AccommodationProvider::class);
    }
    public function images()
{
    return $this->hasMany(UnitTypeImage::class);
}

public function amenities()
{
    return $this->belongsToMany(Amenity::class);
}
}
