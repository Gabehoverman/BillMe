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
        'id','name','address'
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
        return $this->hasMany('tenants');
    }

    public function utilities() {
        return $this->hasMany('utilities');
    }
}
