<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;

class Tenant extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tenant';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','role','move_in_date','move_out_date','active','home_id'
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


    public function home() {
        return $this->belongsTo('home');
    }

    public function payments() {
        return $this->hasMany('payments');
    }

    public function user() {
        return $this->belongsTo('user');
    }

    public static function saveTenant($req) {
    	$tenant = new Tenant();
		try {
			$tenant->name          = $req->name;
			$tenant->role          = 'tenant';
			$tenant->move_in_date  = $req->move_in_date;
			$tenant->move_out_date = $req->move_out_date;
			$tenant->active        = true;
			$tenant->home_id       = 1;

			$tenant->save();

		} catch(Exception $E) {
			return $E;
	    }
		return true;
    }

    public static function getTenantInfo() {

    }

}
