<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UnitSuiteItem extends Model
{
    protected $fillable = ['suite_id', 'unit_id'];

     public function suite()
    {
        return $this->belongsTo(UnitSuite::class, 'suite_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}

