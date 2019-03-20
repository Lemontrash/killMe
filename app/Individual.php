<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;
//use Laravel\Passport\HasApiTokens;

class Individual extends Authenticatable
    implements MustVerifyEmail

{
    use  Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'firstName', 'secondName', 'lastName', 'email','password','country','citizenship','place-of-birth',
        'mobile','land-line','address','city','zip','employment','industry','annual-income','savings','source-of-funds','trading-frequency',
        'invest-annually', 'funding-method', 'name-of-bank', 'bank-location', 'credit-card', 'e-wallet', 'country-taxes', 'tax-id',
        'date-of-birth', 'avatar', 'role'
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
            $builder->where('role', 'individual');
        });
    }

    public function files(){
        return $this->hasMany(Files::class);
    }

    public function business(){
        return $this->belongsTo(Business::class, 'relation_id', 'id');
    }


}
