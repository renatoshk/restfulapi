<?php

namespace App;
use App\Scopes\SellerScope;
class Seller extends User
{
	protected static function boot(){
    	parent::boot();
    	static::addGlobalScope(new SellerScope);
    }
    //products relation
    public function products(){
    	return $this->hasMany('App\Product');
    }
}
