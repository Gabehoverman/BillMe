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
use App\Models\Task;
use App\Models\Alert;
use App\Models\AlertType;
use App\Models\CommentType;

class TaskController extends Controller
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
     * URI: /tasks
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Home::find(Auth::user())->tasks;
    }

    /**
     * Method: GET
     * URI: /tasks/{task_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Task::find($id);
    }

    /**
     * Method: GET
     * URI: /tasks/create
     * Creates a new bills
     */
    public function create(Request $req) {
        return Task::create($req->all);
    }

    /**
     * Method: POST
     * URI: /tasks
     * Creates a new payment
     */
    public function store(Request $req) {
        return Task::create($req);
    }

    /**
     * Method: GET
     * URI: /tasks/{tasks_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req, $id) {
        $Task = Task::findOrFail($id);
        $Task->update($req->all());
    
        return $Task;
    }

    /**
     * Method: PUT/PATCH
     * URI: /tasks/{id}
     * Updates a specific bills based on id
     */
    public function update(Request $req, $id) {
        $Task = Task::findOrFail($id);
        $data = $req->all();
        $Task->update($req->all());
        $Task->completed = $data['completed'];
        $Task->save();
    
        return $data;
    }

    /**
     * Method: DELETE
     * URI: /
     */
    public function destroy($id) {
        Task::find($id)->delete();

        return 204;
    }

    public function allData() {
		$data['Tasks'] = Home::find(Auth::user())->tasks;
		$data['Alerts'] = Alert::where('home_id', Auth::user()->home_id)->where('alert_type',AlertType::Task)->orWhere('alert_type',AlertType::TaskComment)->with('user')->get();

        return $data;
    }

    public function taskComments($id) {
        return Comment::where('item_id',$id)->where('comment_type',CommentType::Task)->with('user')->get();
     }
}