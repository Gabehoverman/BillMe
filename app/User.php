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
        'name', 'email', 'password','tenant_id','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tenant() {
        return $this->hasOne('App\Models\Tenant');
    }

    public function alerts() {
        return $this->hasMany('App\Models\Alert');
    }

    public function tasks() {
        return $this->hasMany('App\Models\Task');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }

    public function payments() {
        return $this->hasMany('App\Models\Payment');
    }

    public function home() {
        return $this->belongsTo('App\Models\Home');
    }



}
