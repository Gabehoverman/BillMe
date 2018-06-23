<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon;

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
        'id','home_id','user_id','date','image_url','approved','notes','active','amount'
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

    public function tenant() {
        return $this->belongsTo('App\Models\Tenant');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function home() {
        return $this->belongsTo('App\Models\Home');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment','item_id')->where('comment_type',CommentType::Payment);
    }

    public static function create($data) {

        $payment = new Payment;
        $payment->home_id = Auth::user()->home_id;
        $payment->user_id = Auth::user()->id;
        $payment->active = true;
        $payment->amount = $data->amount;
        $payment->notes = $data->notes;
        $payment->date = Carbon\Carbon::now();

        $payment->save();

        return $payment;
    }

    public static function getPayments($user) {
        $payments = Payment::all()->where('tenant_id','=',$user->tenant_id);
        $payment_total = 0;
        foreach ($payments as $payment)
            $payment_total = $payment_total + $payment->amount;
        return $payment_total;
    }

    public static function getHomeUtilities($home) {
        $utilities = Utility::all()->where('home_id', '=', $home->id);
        $bill_total = 0;
        foreach ($utilities as $util) {
            $bill = Bill::all()->where('utility_id', '=', $util->id);
            foreach ($bill as $b) {
                $bill_total = $bill_total + $b->amount;
            }
        }
        return $bill_total;
    }

    public static function getAllPayments() {
    	$payments = Payment::all();
    	$paymentSum = 0;
    	foreach ($payments as $payment) {
    		$paymentSum = $paymentSum + $payment->amount;
	    }
	    return($paymentSum);
    }
}
