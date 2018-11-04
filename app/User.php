<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','phone','country','username','status','permission'
    ];

    public function setPasswordAttribute($date)
    {
        if (isset($date) && !empty($date)) {
            $this->attributes['password'] = bcrypt($date);
        }
    }

    public function companies()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
