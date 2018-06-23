<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlertType extends Model
{
     /**
     * Static model. Const variables not stored in database;
     */
    const Bill = 0;
    const Payment = 1;
    const Maintenance = 2;
    const Task = 3;
    const Post = 4;
    const Comment = 5;
    const Other = 9;

    const PostComment = 10;
    const TaskComment = 11;

    const TaskComplete = 20;
    const MaintenanceComplete = 21;
    
}
