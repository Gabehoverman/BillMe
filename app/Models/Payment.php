<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','recipient_id','tenant_id','image_url','approved'
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


    public $timestamps = false;


    public function tenant() {
        return $this->belongsTo('tenant');
    }

    public function utility() {
        return $this->belongsTo('utility');
    }
}
