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

class BillController extends Controller
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
     * URI: /bills
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Home::find(Auth::user())->bills;
    }

    /**
     * Method: GET
     * URI: /bills/{bills_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Bill::find($id);
    }

    /**
     * Method: GET
     * URI: /bills/create
     * Creates a new bills
     */
    public function create(Request $req) {
        return Bill::create($req->all);
    }

    /**
     * Method: POST
     * URI: /payments
     * Creates a new payment
     */
    public function store(Request $req) {
        return Bill::create($req);
    }

    /**
     * Method: GET
     * URI: /bills/{bills_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req,$id) {
        $Bill = Bill::findOrFail($id);
        $Bill->update($req->all());
    
        return $Bill;
    }

    /**
     * Method: PUT/PATCH
     * URI: /bills/{id}
     * Updates a specific bills based on id
     */
    public function updated(Request $req, $id) {
        $Bill = Bill::findOrFail($id);
        $Bill->update($req->all());
    
        return $Bill;
    }

    /**
     * Method: DELETE
     * URI: /bills/{id}
     */
    public function destroy($id) {
        Bill::find($id)->delete();
        return 204;
    }

    public function allData() {
        $data['Bills'] = Home::find(Auth::user())->bills;
        $data['Bills'] = Bill::where('home_id', Auth::user()->home_id)->with('home')->with('user')->get();

        $data['Total'] = Bill::getBillSum();
        $data['Share'] = $data['Total']/5;

        return $data;
    }

    public function billWithComments($id) {
        return Bill::find($id)->with('comments')->with('user')->get();
    }

    public function billComments($id) {
        return Comment::where('item_id',$id)->where('comment_type',CommentType::Bill)->with('user')->get();
        //return Bill::find($id)->comments;
    }
}