<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'home';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','address','code'
    ];

    /**
     * The attribute that are guarded and not mass assignable
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    public function tenants() {
        return $this->hasMany('App\Models\Tenant');
    }

    public function users() {
        return $this->hasMany('App\User');
    }

    public function utilities() {
        return $this->hasMany('App\Models\Utility');
    }

    public function bills() {
        return $this->hasMany('App\Models\Bill');
    }

    public function payments() {
        return $this->hasMany('App\Models\Payment');
    }

    public function maintenance() {
        return $this->hasMany('App\Models\Maintenance');
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

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public static function generateCode() {
        return $code = uniqid();
    }

    public static function findByCode($code) {
       $home = Home::where('code','=',$code)->first();
       return $home;
    }

}
