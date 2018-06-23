<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('admin/dashboard');
    }

    public function get() {

        $data['home'] = Home::all();
        $data['maintenance'] = Home::find(1)->maintenance;
        $data['tenants'] = Home::find(1)->tenants;
    
        //Bills
        $data['bills'] = Home::find(1)->bills;
        foreach ($data['bills'] as $bill) {
            $data['bills'] = Bill::where('id',$bill->id)->with('comments')->get();
        }
    
        $data['payments'] = Home::find(1)->payments;
        foreach ($data['payments'] as $payment) {
            $data['payments'] = Payment::where('id',$payment->id)->with('comments')->get();
        }
    
        $data['alerts'] = Home::find(1)->alerts;
        return $data;

    }
}
