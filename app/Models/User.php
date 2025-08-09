<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail; 

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  protected $fillable = [
    'id',
        'fname',
        'lname',
        'email',
        'mobile',
        'nrc_no',
        'gender',
        'status',
        'provider_id',
        'group_id',
        'password',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail()); // Use the custom notification
    }
    public function user_group() {
        
        return $this->belongsTo(user_group::class, 'group_id','id');
    }
    public function referrals()
    {
        return $this->hasMany(Referrals::class, 'referrer_id');
    }

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'referred_by', 'referral_code');
    }
     public function provider()
    {
        return $this->belongsTo(AccommodationProvider::class);
    }
    
}
