<?php

namespace App\Http\Controllers\API\V1;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Bill;
use App\Models\Payment;
use App\Models\Comments;

class HomeController extends Controller
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
     * URI: /home
     * Return user's home
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Home::find(Auth::user()->home_id);
    }

    /**
     * Method: GET
     * URI: /home/{home_id}
     * Return specific home based on id
     */
    public function show($id) {
        return Home::find($id);
    }

    /**
     * Method: GET
     * URI: /home/create
     * Creates a new home
     */
    public function create(Request $req) {
        return Home::create($req->all);

    }

    /**
     * Method: GET
     * URI: /home/{home_id}/edit
     * Edit a home based on id
     */
    public function edit(Request $req,$id) {
        $home = Home::findOrFail($id);
        $home->update($req->all());
    
        return $home;
    }

    /**
     * Method: PUT/PATCH
     * URI: /home/{id}
     * Updates a specific home based on id
     */
    public function updated(Request $req, $id) {
        $home = Home::findOrFail($id);
        $home->update($req->all());
    
        return $article;
    }

    /**
     * Method: DELETE
     * URI:
     */
    public function delete($id) {
        Home::find($id)->delete();

        return 204;
    }

    /** 
     * Get all data for a home;
     */
    public function getAll() {

        $data['home'] = Home::find(Auth::user());
        $data['maintenance'] = Home::find(Auth::user())->maintenance;
        $data['tenants'] = Home::find(Auth::user())->tenants;
    
        //Bills
        $data['bills'] = Home::find(Auth::user())->bills;
        foreach ($data['bills'] as $bill) {
            $data['bills'] = Bill::where('id',$bill->id)->with('comments')->get();
        }
    
        $data['payments'] = Home::find(Auth::user())->payments;
        foreach ($data['payments'] as $payment) {
            $data['payments'] = Payment::where('id',$payment->id)->with('comments')->get();
        }

        $data['tasks'] = Home::find(Auth::user())->tasks;

        $data['posts'] = Home::find(Auth::user())->posts;

        $data['alerts'] = Home::find(Auth::user())->alerts;

        return $data;

    }
}