<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    //
    use SoftDeletes;
    const AVAILABLE_PRODUCT = 'available';
    const UNAVAILABLE_PRODUCT = 'unavailable';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','description','quantity','status','image','seller_id'];
    //method to check if status is available
    public function isAvailable(){
    	return $this->status == Product::AVAILABLE_PRODUCT;
    }
    //categories relation
     public function categories(){
    	return $this->belongsToMany('App\Category');
    }
    //transaction relation
    public function transactions(){
    	return $this->hasMany('App\Transaction');
    }
    //seller relation
    public function seller(){
    	return $this->belongsTo('App\Seller','seller_id');
    }
}
