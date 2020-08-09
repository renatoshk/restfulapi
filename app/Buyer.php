<?php

namespace App;
use App\Scopes\BuyerScope;
class Buyer extends User
{
    // 
    protected static function boot(){
    	parent::boot();
    	static::addGlobalScope(new BuyerScope);
    }
    //transactions relationship
    public function transactions(){
    	return $this->hasMany('App\Transaction');
    }
    
}
