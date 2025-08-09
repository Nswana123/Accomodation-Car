<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_no','customer_id', 'unit_id', 'suite_id', 'check_in_date', 'guests', 'check_out_date', 'total_price', 'status'];

    public function customer()
    {
        return $this->belongsTo(user::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function suite()
    {
        return $this->belongsTo(UnitSuite::class);
    }
   public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    
}
