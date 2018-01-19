<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bill';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','utility_id','amount','bill_date','month','due_date','image_url','approved','notes'
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

   

    public static function getBillSum() {
    	$bills = Bill::all();
    	$billsum = 0;
    	foreach( $bills as $bill) {
    		$billsum = $billsum + $bill->amount;
	    }
	    return $billsum;
    }
}
