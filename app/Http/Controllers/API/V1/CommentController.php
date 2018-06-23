<?php

namespace App\Http\Controllers\API\V1;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\Comment;
use App\Models\Maintenance;

class CommentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Method: GET
     * URI: /comments
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Home::find(Auth::user())->comments;
    }

    /**
     * Method: GET
     * URI: /comments/{comment_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Comment::find($id)->with('user')->get();
    }

    /**
     * Method: GET
     * URI: /comments/create
     * Creates a new bills
     */
    public function create(Request $req) {
        return Comment::create($req->all);
    }

     /**
     * Method: POST
     * URI: /comments
     * Creates a new payment
     */
    public function store(Request $req) {
        $comment = Comment::create($req);
        return Comment::where('id',$comment->id)->with('user')->get();
    }

    /**
     * Method: GET
     * URI: /comments/{comment_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req,$id) {
        $Comment = Comment::findOrFail($id);
        $Comment->update($req->all());
    
        return $Comment;
    }

    /**
     * Method: PUT/PATCH
     * URI: /comments/{id}
     * Updates a specific bills based on id
     */
    public function updated(Request $req, $id) {
        $Comment = Comment::findOrFail($id);
        $Comment->update($req->all());
    
        return $Comment;
    }

    /**
     * Method: DELETE
     * URI: /
     */
    public function delete($id) {
        Comment::find($id)->delete();

        return 204;
    }

    public function allData() {
        return $data;
    }

    public function commenyByType($type, $id) {
        return $type;
    }
}