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
use App\Models\Comment;
use App\Models\CommentType;

class PaymentController extends Controller
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
     * URI: /payments
     * Return user's bills
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //return Payment::where('home_id',Auth::user()->home_id)->with('user')->get();
        return Home::find(Auth::user())->payments;
    }

    /**
     * Method: GET
     * URI: /payments/{payments_id}
     * Return specific bills based on id
     */
    public function show($id) {
        return Payment::find($id);
    }

    /**
     * Method: GET
     * URI: /payments/create
     * Creates a new bills
     */
    public function create(Request $req) {
        //return Payment::create($req->all);
        $req["amount"] = 123;
        $req['notes'] = 'Some notes';
        return Payment::create($req);

    }

    /**
     * Method: POST
     * URI: /payments
     * Creates a new payment
     */
    public function store(Request $req) {
        return Payment::create($req);
    }

    /**
     * Method: GET
     * URI: /payments/{payments_id}/edit
     * Edit a bills based on id
     */
    public function edit(Request $req,$id) {
        $Payment = Payment::findOrFail($id);
        $Payment->update($req->all());
    
        return $Payment;
    }

    /**
     * Method: PUT/PATCH
     * URI: /payments/{id}
     * Updates a specific bills based on id
     */
    public function updated(Request $req, $id) {
        $Payment = Payment::findOrFail($id);
        $Payment->update($req->all());
    
        return $Payment;
    }

    /**
     * Method: DELETE
     * URI: /payments/{id}
     */
    public function destroy($id) {
        Payment::find($id)->delete();
        return 204;
    }

    public function allData() {
        $data['Payments'] = Payment::where('home_id',Auth::user()->home_id)->with('user')->get();

        $data['Total'] = Payment::getAllPayments();

        $data['UserPayments'] = Payment::getAllPayments(Auth::user());

        return $data;
    }

    public function paymentComments($id) {
       return Comment::where('item_id',$id)->where('comment_type',CommentType::Payment)->with('user')->get();
    }
}