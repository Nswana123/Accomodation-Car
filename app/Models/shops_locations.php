<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class shops_locations extends Model
{
      protected $table = 'shops_location';
     protected $fillable = ['shop_id', 'location'];

    public function userGroup()
    {
        return $this->belongsTo(user_group::class, 'shop_id');
    }
      public function applications()
    {
        return $this->hasMany(application_tbl::class, 'shop_location_id');
    }
}
