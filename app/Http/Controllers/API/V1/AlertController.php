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
use App\Models\Alert;

class AlertController extends Controller
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
     * URI: /alerts
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Home::find(Auth::user())->alerts;
        return Alert::where('home_id',Auth::user()->home_id)->with('user')->get();
    }

    /**
     * Method: GET
     * URI: /alerts/{alert_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Alert::find($id);
    }

    /**
     * Method: GET
     * URI: /alerts/create
     * Creates a new bills
     */
    public function create(Request $req) {
        return Alert::create($req->all);

    }

    /**
     * Method: GET
     * URI: /alerts/{alert_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req,$id) {
        $Alert = Alert::findOrFail($id);
        $Alert->update($req->all());
    
        return $Alert;
    }

    /**
     * Method: PUT/PATCH
     * URI: /alerts/{id}
     * Updates a specific bills based on id
     */
    public function updated(Request $req, $id) {
        $Alert = Alert::findOrFail($id);
        $Alert->update($req->all());
    
        return $Alert;
    }

    /**
     * Method: DELETE
     * URI: /
     */
    public function delete($id) {
        Alert::find($id)->delete();

        return 204;
    }

    public function allData() {
        return $data;
    }
}