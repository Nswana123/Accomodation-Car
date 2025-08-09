<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitTypeImage extends Model
{
    protected $fillable = ['unit_type_id', 'image'];
    
    public function unitType()
{
    return $this->belongsTo(UnitType::class);
}


}
