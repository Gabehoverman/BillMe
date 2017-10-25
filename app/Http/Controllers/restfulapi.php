<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Utility;

class restfulapi extends Controller
{



    /**** Utility Controls ****/

    //Get all Utilities
    public function getAllUtilities() {
        $util = Utility::all();
        $data['data'] = $util;
        return $data;
    }

    //Get utility based on ID
    public function getOneUtility($id) {
        $util = Utility::all()->where('id','=',$id);
        $data['data'] = $util;
        return view('APIViews/APIData',$data);
    }

    //Get utility based on home ID
    public function getHomeUtilities($id) {
        $util = Utility::all()->where('home_id','=',$id);
        $data['data'] = $util;
        return view('APIViews/APIData',$data);
    }


    /**** Bill Controls ****/
    public function getAllBills() {
        $bills = Bill::all();
        $data['data'] = $bills;
        return view('APIViews/APIData',$data);
    }

    public function getOneBill($id) {
        $bills = Bill::all()->where('id','=',$id);
        $data['data'] = $bills;
        return view('APIViews/APIData',$data);
    }

    public function getUtilityBill() {
        $bills = Bill::all();
        $data['data'] = $bills;
        return view('APIViews/APIData',$data);
    }


}
