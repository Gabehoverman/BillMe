<?php

namespace App\Models;
use Auth;
use Carbon;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'maintenance';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'id','home_id','user_id','active','notes','completed'
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
	

	public static function getAllCompleted() {
		$maintenance = Maintenance::all();
		$count = 0;
		foreach ($maintenance as $m) {
			if ($m->active == 1) {
			}
			else {
				$count++;
			}
			return $count;
		}

	}

	public function getHouse() {
		return $this->belongsTo('App\Models\Home');
	}

	public function comments() {
        return $this->hasMany('App\Models\Comment','item_id')->where('comment_type',CommentType::Maintenance);
	}
	
	public function user() {
		return $this->belongsTo('App\User');
	}

	public static function create($data) {

        $Maintenance = new Maintenance;
        $Maintenance->home_id = Auth::user()->home_id;
        $Maintenance->user_id = Auth::user()->id;
        $Maintenance->active = true;
		$Maintenance->notes = $data->notes;
		$Maintenance->completed = false;

		$Maintenance->save();
		
        return $Maintenance;
    }



}
