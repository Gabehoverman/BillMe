<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'utility';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','type','name','home_id'
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

    public function home() {
        return $this->belongsTo('home');
    }

    public function payment() {
        return $this->hasMany('payment');
    }

    public function bill() {
        //return $this->hasMany('app\Models\bill');
    }
}
