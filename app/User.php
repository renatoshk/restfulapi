<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';
    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates =['deleted_at'];
    protected $fillable = [
        'name', 'email', 'password','verified','verification_token','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verification_token',
    ];
    //mutators function for name
    public function setNameAttribute($name){
            $this->attributes['name'] = strtolower($name);
    }
    //accessors function for name
     public function getNameAttribute($name){
            return ucwords($name);
    }
    //mutators function for email
    public function setEmailAttribute($email){
            $this->attributes['email'] = strtolower($email);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //method to check if user is verified 
    public function isVerified(){
        return $this->verified == User::VERIFIED_USER;
    }
    //method to check if user is admin
    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }
    // static method to generate verification toke
    public static function generateVerificationCode(){
        return Str::random(40);
    }
}
