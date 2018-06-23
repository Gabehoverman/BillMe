<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Alert extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alert';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','home_id','user_id','notes','active'
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

    public function home() {
        return $this->belongsTo('App\Models\Home');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public static function createAlert($type) {
        $alert = new Alert;
        $alert->user_id= Auth::user()->id;
        $alert->home_id = Auth::user()->tenant->home->id;
        $alert->active = true;
        $alert->alert_type = $type;
        switch ($type) {
            case AlertType::Bill:
                $alert->notes = 'added a new bill';
                break;
            case AlertType::Payment:
                $alert->notes = 'added a new payment';
                break;
            case AlertType::Maintenance:
                $alert->notes = 'added a maintenance request';
                break;
            case AlertType::Task:
                $alert->notes = 'added a new Task';
                break;
            case AlertType::Post:
                $alert->notes = 'added a new post';
                break;
            case AlertType::Comment:
                $alert->notes = 'added a new comment';
                break;
            case AlertType::PostComment:
                $alert->notes = 'commented on a post';
                break;
            case AlertType::TaskComment:
                $alert->notes = 'commented on a task';
                break;
            default:
                $alert->notes = 'added a new item';
                break;
        }
        $alert->save();
    }


}
