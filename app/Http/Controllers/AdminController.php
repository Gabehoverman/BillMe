<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class AdminController extends Controller
{

    public function dashboard()
    {

        //Get user information, tenant id, and home id
        $user = Auth::user();
        $tenant = Tenant::all()->where('id','=',$user->tenant_id);
        foreach ($tenant as $t)
            $home = Home::all()->where('id','=',$t->home_id);
        foreach ($home as $h)
            $home = $h;

        //Find all payments Tenant has made and sum
        $payments = Payment::all()->where('tenant_id', '=', $user->tenant_id);
        $payment_total = 0;
        foreach ($payments as $payment)
            $payment_total = $payment_total + $payment->amount;

        //Find all bills home has and sum
        $utilities = Utility::all()->where('home_id', '=', $home->id);
        $bill_total = 0;
        foreach ($utilities as $util) {
            $bill = Bill::all()->where('utility_id', '=', $util->id);
            foreach ($bill as $b) {
                $bill_total = $bill_total + $b->amount;
            }
        }

        $date = getdate();
        $prevMonth = date("F", strtotime($date['month'] . " last month"));

        $eachUtil = array();
        foreach($utilities as $ut) {
            $bill = Bill::all()->where('utility_id','=',$ut->id)->where('month','=',$date['month']);
            //if ($bill != null) {
                foreach ($bill as $b) {
                    $eachUtil[$ut->name] = $b;
                }
            //} else {

                $eachUtil[$ut->name] = 0;
            //}
        }
        $prevUtil = array();
        foreach($utilities as $ut) {
            $bill = Bill::all()->where('utility_id','=',$ut->id)->where('month','=',$date['month']);
            foreach ($bill as $b) {
                $prevUtil[$ut->name] = $b;
            }
        }

        //Utilitiy totals from day 1
        $totalUtilities = array();
        foreach($utilities as $ut) {
            $totalUtilities[$ut->name] = 0;
            $bill = Bill::all()->where('utility_id','=',$ut->id);
            foreach ($bill as $b) {
                $totalUtilities[$ut->name] = $totalUtilities[$ut->name] + $b->amount;
            }
        }

        $totalPayments = array();
        foreach($utilities as $ut) {
            $totalPayments[$ut->name] = 0;
            $payment = Payment::all()->where('recipient_id','=',$ut->id);
            foreach ($payment as $p) {
                $totalPayments[$ut->name] = $totalPayments[$ut->name] + $p->amount;
            }
        }

        //Total utilities minus all payments
        foreach ($utilities as $ut)
            try {
                $totalUtilities[$ut->name] = $totalUtilities[$ut->name] - $totalPayments[$ut->name];
            } catch (Exception $E) {
                echo $E;
            }





        //Get all tenants
        $tenants = Tenant::all()->where('home_id','=',$home->id);
        $bill_total = $bill_total/sizeof($tenants);

        //Calculates difference between payments and bills to find owage.
        $user_total = $payment_total - $bill_total;

        //Find total for utilities for current month
        $date = getdate();
        $monthly_util_sum = 0;
        $month_util = Bill::all();
        foreach ($month_util as $m) {
            if ($m['month'] == $date['month']) {
                $monthly_util_sum = $monthly_util_sum + $m->amount;
            } else {

            }
        }

        //Pass data to view
        $data = array(
            'bill' => $user_total,
            'monthly_util_sum' => $monthly_util_sum,
            'eachUtil' => $eachUtil,
            'prevUtil' => $prevUtil,
            'payments' => $payment_total,
            'totalUtil' => $totalUtilities
        );
        return view('admin/home', $data);
    }

    public function addBill()
    {
        $data = array();

        $bill = new Bill();
        $data['bill'] = $bill;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

        $data['success'] = 'False';

        return view('admin/bill-form', $data);
    }

    public function updateBill(Request $req)
    {

        $bill_id = $req->id;

        if ($bill_id) {
            $bill = Bill::all()->where('id','=',$bill_id);
        } else {
            $bill = new Bill();
        }


        $bill->amount = $req->get('amount', '');
        $bill->bill_date = new \DateTime($req->get("bill_date"));
        $bill->due_date = new \DateTime($req->get('due_date'));
        $bill->utility_id = $req->get('recipient','');
        $bill->image_url = "hello world";
        $bill->month = $req->get('month');
        $bill->active = false;
        $bill->notes = $req->get('notes');

        $bill->save();
        $data['bill'] = $bill;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

        $data['success'] = 'True';

        return view('admin/bill-form', $data);

    }


    public function addPayment()
    {
        $data = array();

        $payment = new Payment();
        $data['payment'] = $payment;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

        $data['success'] = 'False';
        return view('admin/payment-form',$data);
    }


    public function updatePayment(Request $req)
    {
        $payment_id = $req->id;

        if ($payment_id) {
            $payment = Payment::all()->where('id','=',$payment_id);
        } else {
            $payment = new Payment();
        }
        //$payment = new Payment();

        $payment->tenant_id = Auth::user()->id;
        $payment->amount = $req->get('amount');
        $payment->recipient_id = $req->get('recipient');
        $payment->payment_date = new \DateTime($req->get("due_date"));
        $payment->image_url = 'null';
        $payment->approved = false;
        $payment->notes = $req->get('notes');

        $payment->save();

        $utilities = Utility::all();
        $data['utilities'] = $utilities;
        $data['payment'] = $payment;

        $data['success'] = 'True';

        return view('admin/payment-form',$data);
    }

    public function bills() {

        $bills = Bill::all();
        foreach($bills as $bill) {
            $utilities = Utility::all();
            foreach($utilities as $util)
            if ($bill->utility_id == $util->id) {
                $bill['utility'] = $util->name;
            }
        }
        $data['bills'] = $bills;

        return view('admin/bills',$data);
    }

    public function payments() {
        $payments = Payment::all();
        foreach($payments as $payment) {
            $tenant = Tenant::all()->where('id','=',$payment->tenant_id);
            foreach ($tenant as $t) {
                $tenant = $t;
            }
            $payment['tenant'] = $tenant->name;
            $utilities = Utility::all();
            foreach($utilities as $util) {
                if ($payment->recipient_id == $util->id) {
                    $payment['utility'] = $util->name;
                }
            }
        }
        $data['payments'] = $payments;

        return view('admin/payment',$data);
    }

    public function tenants() {
        $user = Auth::user();
        $tenant_info = Tenant::all()->where('id','=',$user->tenant_id);
        foreach ($tenant_info as $t) {
            $tenant_info = $t;
        }
        $home = Home::all()->where('id','=',$tenant_info->home_id);
        foreach ($home as $h)
            $home = $h;
        $data['home'] = $home->name;
        $tenants = Tenant::all()->where('home_id','=',$home->id);
        $data['tenants'] = $tenants;

        return view('admin/tenants',$data);
    }

    public function settings() {

        $user = Auth::user();
        $tenant_info = Tenant::all()->where('id','=',$user->tenant_id);
        foreach ($tenant_info as $t)
            $tenant_info = $t;
        $home = Home::all()->where('id','=',$tenant_info->home_id);
        foreach ($home as $h)
            $home = $h;
        $success = false;
        $data['success'] = $success;
        $data['user'] = $user;
        $data['tenant'] = $tenant_info;
        $data['home'] = $home;


        return view('admin/settings',$data);
    }

    public function updateSettings(Request $req) {

        $user = Auth::user();
        $tenant = Tenant::all()->where('id','=',$user->tenant_id);
        foreach ($tenant as $t)
            $tenant = $t;
        $home = Home::all()->where('id','=',$tenant->home_id);
        foreach ($home as $h)
            $home = $h;

        if ($req->action == 1) {
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->save();
            $success = true;
        } else if ($req->action == 2) {
            $tenant->move_out_date = $req->move_out_date;
            $tenant->save();
            $success = true;
        } else {
            $success = false;
        }
        $data['success'] = $success;
        $data['user'] = $user;
        $data['tenant'] = $tenant;
        $data['home'] = $home;

        return view('admin/settings',$data);
    }

    public function logout() {
        Auth::logout();

        return view('Auth/login');
    }



}