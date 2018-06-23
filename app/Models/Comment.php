<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon;

class Comment extends Model
{
    
       /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','home_id','user_id','item_id','comment_type','description','active'
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

    public function bill() {
        return $this->belongsTo('App\Models\Bill','item_id')->where('comment_type',CommentType::Bill);
    }

    public function payment() {
        return $this->belongsTo('App\Models\Payment','item_id')->where('comment_type',CommentType::Payment);
    }

    public function maintenance() {
        return $this->belongsTo('App\Models\Maintenance','item_id')->where('comment_type',CommentType::Maintenance);
    }

    public function alert() {
        return $this->belongsTo('App\Models\Alert','item_id')->where('comment_type',CommentType::Alert);
    }

    public function post() {
        return $this->belongsTo('App\Models\Post','item_id')->where('comment_type',CommentType::Post);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function create($data) {

        $comment = new Comment;
        $comment->home_id = Auth::user()->home_id;
        $comment->user_id = Auth::user()->id;
        $comment->item_id = $data->item_id;
        $comment->comment_type = $data->comment_type;
        $comment->description = $data->comment;
        $comment->active = true;

        $comment->save();

        return $comment;
        }

}
