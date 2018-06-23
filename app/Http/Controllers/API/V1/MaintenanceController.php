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
use App\Models\CommentType;

class MaintenanceController extends Controller
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
     * URI: /maintenance
     * Return user's home
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Home::find(Auth::user())->maintenance;
        return Maintenance::where('home_id',Auth::user()->home_id)->with('user')->get();
    }

    /**
     * Method: GET
     * URI: /maintenance/{maintenance_id}
     * Return specific home based on id
     */
    public function show($id) {
        return Maintenance::find($id);
    }

    /**
     * Method: GET
     * URI: /maintenance/create
     * Creates a new home
     */
    public function create(Request $req) {
        return Maintenance::create($req);
    }

    /**
     * Method: POST
     * URI: /maintenance
     * Creates a new payment
     */
    public function store(Request $req) {
        return Maintenance::create($req);
    }

    /**
     * Method: GET
     * URI: /maintenance/{maintenance_id}/edit
     * Edit a home based on id
     */
    public function edit(Request $req,$id) {
        $Maintenance = Maintenance::findOrFail($id);
        $Maintenance->update($req->all());
    
        return $Maintenance;
    }

    /**
     * Method: PUT/PATCH
     * URI: /maintenance/{id}
     * Updates a specific home based on id
     */
    public function update(Request $req, $id) {
        $Maintenance = Maintenance::findOrFail($id);
        $Maintenance->update($req->all());
    
        return $Maintenance;
    }

    /**
     * Method: DELETE
     * URI:
     */
    public function destroy($id) {
        Maintenance::find($id)->delete();
        return 204;
    }

    public function allData() {
        $data['Completed'] = Maintenance::where('user_id',Auth::user()->id)->where('completed',true)->get();
        $data['Completed'] = count($data['Completed']);

        $data['Outstanding'] = Maintenance::where('user_id',Auth::user()->id)->where('completed',false)->get();
        $data['Outstanding'] = count($data['Outstanding']);

        $data['Maintenance'] = Maintenance::where('user_id',Auth::user()->id)->with('user')->get();
        $data['Total'] = count($data['Maintenance']);

        return json_encode($data);
    }

    public function completed() { 
        $data['complete'] = count(Maintenance::where('user_id',Auth::user()->id)->where('completed',true)->get());
        return $data;
    }

    public function maintenanceComments($id) {
        return Comment::where('item_id',$id)->where('comment_type',CommentType::Maintenance)->with('user')->get();
     }

}