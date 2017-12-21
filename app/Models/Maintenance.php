<?php

namespace App\Models;

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
		'id','tenant','active','notes'
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


}
