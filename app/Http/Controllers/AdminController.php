<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;

class AdminController extends Controller
{
    public function dashboard()
    {

        //Get user information, tenant id, and home id
        $user = Auth::user();
        $tenant_info = Tenant::all()->where('name', '=', $user->name);
        $tenant_id = $tenant_info[0]->home_id;
        $home = Home::all()->find($tenant_id);

        //Find all payments Tenant has made and sum
        $payments = Payment::all()->where('tenant_id', '=', $tenant_id);
        $payment_total = 0;
        foreach ($payments as $payment) {
            $payment_total = $payment_total + $payment->amount;
        }

        //Find all bills home has and sum
        $utilities = Utility::all()->where('home_id', '=', $home->id);
        $bill_total = 0;
        foreach ($utilities as $util) {
            $bill = Bill::all()->where('utility_id', '=', $util->id);
            foreach ($bill as $b) {
                $bill_total = $bill_total + $b->amount;
            }
        }
        //$bills = Bill::all()->where('utility_id','=',$utilities[0]->id);


        //Calculates difference between payments and bills to find owage.
        $user_total = $payment_total - $bill_total;

        //Find most recent payments
        $recent_payments = Payment::all()->sortBy('id');

        //Get all tenants
        $tenants = Tenant::all()->where('home_id', $home->id);

        //Pass data to view
        $data = array(
            'name' => 'Gabe',
            'user' => $user,
            'bill' => $user_total,
            'recent_payments' => $recent_payments,
            'tenants' => $tenants

        );
        return view('admin/dashboard', $data);
    }

    public function addBill()
    {

        $data = array();

        $bill = new Bill();
        $data['bill'] = $bill;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

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
        $bill->bill_date = new \DateTime($req->get("due_date"));
        $bill->utility_id = $req->get('recipient', '');
        $bill->image_url = "hello world";
        $bill->active = false;

        $bill->save();
        $data['bill'] = $bill;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

        return view('admin/bill-form', $data);

    }

    public function addPayment()
    {
        $data = array();

        $payment = new Payment();
        $data['payment'] = $payment;

        $utilities = Utility::all();
        $data['utilities'] = $utilities;

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
        $payment->image_url = 'null';
        $payment->approved = false;

        $payment->save();

        $utilities = Utility::all();
        $data['utilities'] = $utilities;
        $data['payment'] = $payment;

        return view('admin/payment-form',$data);
    }

}