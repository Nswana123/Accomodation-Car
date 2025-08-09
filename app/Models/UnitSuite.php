<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitSuite extends Model
{
    protected $fillable = ['name', 'provider_id', 'total_price_per_day', 'description'];

    public function provider()
    {
        return $this->belongsTo(AccommodationProvider::class);
    }

   public function units()
{
    return $this->belongsToMany(Unit::class, 'unit_suite_items', 'suite_id', 'unit_id')->withTimestamps();
}


        public function items()
    {
        return $this->hasMany(UnitSuiteItem::class, 'suite_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
