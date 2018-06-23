<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon;

class Task extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','home_id','user_id','title','description','completed','active'
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
   public function user() {
       return $this->belongsTo('App\User');
   }

   public function home() {
       return $this->belongsTo('App\Models\Home');
   }

   public function comments() {
        return $this->hasMany('App\Models\Comment','item_id')->where('comment_type',CommentType::Task);
    }

    public static function create($data) {

        $Task = new Task;
        $Task->home_id = Auth::user()->home_id;
        $Task->user_id = Auth::user()->id;
        $Task->title = $data->title;
        $Task->description = $data->description;
        $Task->completed = false;
        $Task->active = true;

        $Task->save();

        return $Task;
    }

}
