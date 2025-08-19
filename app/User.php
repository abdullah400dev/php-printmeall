<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'utype', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function credits(){
        return $this->hasone(UserCredits::class, 'user_id');
    }
    
    public function vendordata(){
        return $this->hasone(VendorData::class, 'user_id');
    }
    
    public function designer(){
        return $this->hasOne(DesignerData::class, 'user_id');   
    }
    
    public function wallet(){
        return $this->hasOne(Wallet::class, 'user_id');   
    }
    
     public function bankdetails(){
        return $this->hasOne(BankDetails::class, 'user_id');   
    }
    
    public function paymentrequest(){
        return $this->hasMany(PaymentRequests::class, 'user_id');   
    }
    
    public function products(){
         return $this->hasMany(RProduct::class, 'user_id', 'id');  
    }
}
