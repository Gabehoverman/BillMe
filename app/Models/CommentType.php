<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentType extends Model
{

    /**
     * Static model. Const variables not stored in database;
     */
    const Bill = 0;
    const Payment = 1;
    const Maintenance = 2;
    const Note = 3;
    const Task = 4;
    const Post = 5;
    const Other = 9;

}
