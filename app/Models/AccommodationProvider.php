<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccommodationProvider extends Model
{
    protected $fillable = ['name', 'type', 'location', 'description'];

public function unitType()
    {
        return $this->hasMany(unitType::class, 'provider_id');
    }
    public function unitTypes()
{
    return $this->hasMany(UnitType::class);
}
    public function units()
{
    return $this->hasMany(Unit::class);
}
    public function suites()
    {
        return $this->hasMany(UnitSuite::class, 'provider_id');
    }
    
   public function amenities()
{
    return $this->belongsToMany(Amenity::class, 'accommodation_provider_amenity');
}
public function images()
{
    return $this->hasMany(ProviderImage::class);
}
  public function user()
    {
        return $this->hasMany(User::class, 'provider_id');
    }
// Count available units
public function getAvailableUnitsCountAttribute()
{
    return $this->unitType->flatMap(function ($type) {
        return $type->units->where('status', 'Available');
    })->count();
} 
public function getLowestNightlyRateAttribute()
{
    $units = $this->unitType->flatMap(function ($type) {
        return $type->units;
    });

    $prices = $units->pluck('price_per_day')->filter(function ($price) {
        return is_numeric($price) && $price > 0;
    });

    return $prices->min() ?? 0;
}
}
