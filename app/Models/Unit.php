<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [ 'unit_type_id', 'name', 'unit_type','car_type','transmission','fuel_type','capacity', 'is_suite', 'price_per_day', 'status', 'description'];

    
    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
   public function images()
    {
        return $this->hasMany(UnitImage::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function suiteItems()
    {
        return $this->hasMany(UnitSuiteItem::class);
    }
    public function amenities()
{
    return $this->belongsToMany(Amenity::class, 'amenity_unit');
}

}
