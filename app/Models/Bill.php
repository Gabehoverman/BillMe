<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon;

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
        'id','utility_id','amount','date','image_url','approved','notes'
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

    /**
     * Object Relational Mapping (ORM) functions
     */
   public function utility() {
       return $this->belongsTo('App\Models\Utility');
   }

   public function home() {
       return $this->belongsTo('App\Models\Home');
   }

   public function comments() {
        return $this->hasMany('App\Models\Comment','item_id')->where('comment_type',CommentType::Bill);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function create($data) {

        $bill = new Bill;
        $bill->home_id = Auth::user()->home_id;
        $bill->user_id = Auth::user()->id;
        $bill->utility_id = 1;
        $bill->active = true;
        $bill->amount = $data->amount;
        $bill->notes = $data->notes;
        $bill->date = Carbon\Carbon::now();

        $bill->save();

        return $bill;
    }

    /**
     * Additional Functions
     */
    public static function getBillSum() {
    	$bills = Bill::all();
    	$billsum = 0;
    	foreach( $bills as $bill) {
    		$billsum = $billsum + $bill->amount;
	    }
	    return $billsum;
    }
}
