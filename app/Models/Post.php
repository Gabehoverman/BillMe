<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon;

class Post extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','home_id','user_id','title','description','active'
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
        return $this->hasMany('App\Models\Comment','item_id')->where('comment_type',CommentType::Post);
    }

    public static function create($data) {

        $Post = new Post;
        $Post->home_id = Auth::user()->home_id;
        $Post->user_id = Auth::user()->id;
        $Post->title = $data->title;
        $Post->description = $data->description;
        $Post->active = true;

        $Post->save();

        return $Post;
    }
}
