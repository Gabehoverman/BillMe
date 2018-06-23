<?php

namespace App\Http\Controllers\API\V1;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\Comments;
use App\Models\Maintenance;
use App\Models\Post;
use App\Models\Alert;
use App\Models\AlertType;


class PostController extends Controller
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
     * URI: /posts
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Post::where('home_id',Auth::user()->home_id)->with('user')->get();

       // return Home::find(Auth::user())->posts;
    }

    /**
     * Method: GET
     * URI: /posts/{post_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Post::find($id);
    }

    /**
     * Method: GET
     * URI: /posts/create
     * Creates a new bills
     */
    public function create(Request $req) {
        return Post::create($req->all);
    }

        /**
     * Method: POST
     * URI: /tasks
     * Creates a new payment
     */
    public function store(Request $req) {
        return Post::create($req);
    }

    /**
     * Method: GET
     * URI: /posts/{post_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req,$id) {
        $Post = Post::findOrFail($id);
        $Post->update($req->all());
    
        return $Post;
    }

    /**
     * Method: PUT/PATCH
     * URI: /posts/{id}
     * Updates a specific bills based on id
     */
    public function update(Request $req, $id) {
        $Post = Post::findOrFail($id);
        $Post->update($req->all());
    
        return $Post;
    }

    /**
     * Method: DELETE
     * URI: /
     */
    public function destroy($id) {
        Post::find($id)->delete();
        return 204;
    }

    public function allData() {
        
        $data['Discussions'] = Post::where('home_id',Auth::user()->home_id)->with('user')->get();

        $data['Alerts'] = Alert::where('home_id', Auth::user()->home_id)->where('alert_type',AlertType::Post)->orWhere('alert_type',AlertType::PostComment)->with('user')->get();

        return $data;
    }

    public function postComments($id) {
        return Comment::where('item_id',$id)->where('comment_type',CommentType::Post)->with('user')->get();
     }
}