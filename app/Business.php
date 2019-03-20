<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
//use Laravel\Passport\HasApiTokens;

class Business extends Authenticatable
{
    use  Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'firstName', 'secondName', 'lastName', 'email','password','country','citizenship','place-of-birth',
        'mobile','land-line','address','city','zip','employment','industry','annual-income','savings','source-of-funds','trading-frequency',
        'invest-annually', 'funding-method', 'name-of-bank', 'bank-location', 'credit-card', 'e-wallet', 'country-taxes', 'tax-id',
        'date-of-birth', 'avatar', 'role', 'individual_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('role', function (Builder $builder) {
            $builder->where('role', 'business');
        });
    }

    public function individuals(){
        return $this->hasMany(Individual::class, 'relation_id', 'id');
    }

    public function files(){
        return $this->hasMany(Files::class);
    }


}
