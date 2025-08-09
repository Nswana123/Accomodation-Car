<?php

// app/Models/Amenity.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    protected $fillable = ['name'];

    public function accommodationProviders()
    {
        return $this->belongsToMany(AccommodationProvider::class);
    }
    public function unitTypes()
{
    return $this->belongsToMany(UnitType::class);
}

}
