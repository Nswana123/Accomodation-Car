<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProviderImage extends Model
{
  protected $fillable = ['accommodation_provider_id', 'image'];

public function provider()
{
    return $this->belongsTo(AccommodationProvider::class);
}

}
