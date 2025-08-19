<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequests extends Model
{
    //
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    protected function setCurrencyAttribute($value){
        return $this->attributes['currency'] = strtoupper($value);
    }
    
    public function getCurrencyAttribute($value){
        return strtoupper($value);
    }
    
    public function getAmountAttribute($value){
        if($value < 10){
            return '0'.$value;
        }else{
            return $value; 
        }
    }
}
