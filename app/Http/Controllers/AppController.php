<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\Bill;
use App\Models\MaintenanceHelper;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Utility;
use App\Models\Maintenance;
use ConsoleTVs\Charts\Builder\Chart;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class AppController extends Controller
{

	public function dashboard() {

		$data['pieChart'] = ChartHelper::PieChart();
		$data['maintenance'] = Maintenance::all();
		$data['chart'] = ChartHelper::UtilitiesChart();

		return view('app/dashboard',$data);
	}

	public function bills(Request $req) {

		$data['success'] = false;
		$data['submission'] = "hello";
		if ($req->type == 'bill' ) {
			$bill = new Bill;

			$bill->amount = $req->get('amount', '');
			$bill->bill_date = new \DateTime($req->get("bill_date"));
			$bill->due_date = new \DateTime($req->get('due_date'));
			$bill->utility_id = $req->get('recipient','');
			$bill->image_url = "hello world";
			$bill->month = $req->get('month');
			$bill->active = false;
			$bill->notes = $req->get('notes');

			$bill->save();
			$data['submission'] = 'bill';
			$data['success'] = true;
		} 
		 if ($req->type == 'payment') {
			$payment = new Payment;

			$payment->tenant_id = Auth::user()->id;
			$payment->amount = $req->get('amount');
			$payment->recipient_id = $req->get('recipient');
			$payment->payment_date = new \DateTime($req->get("due_date"));
			$payment->image_url = 'null';
			$payment->approved = false;
			$payment->notes = $req->get('notes');

			$payment->save();

			$data['submission'] = 'payment';
			$data['success'] = true;
		}
		

		$bills = Bill::all();
		$utilities = Utility::all();
		foreach($bills as $bill) {
			foreach($utilities as $util)
				if ($bill->utility_id == $util->id) {
					$bill['utility'] = $util->name;
				}
		}
		$data['bills'] = $bills;

		$payments = Payment::all();
		foreach($payments as $payment) {
			$tenant = Tenant::where('id','=',$payment->tenant_id)->first();
			$payment['tenant'] = $tenant->name;
			foreach($utilities as $util) {
				if ($payment->recipient_id == $util->id) {
					$payment['utility'] = $util->name;
				}
			}
		}
		$user = Auth::user();

		$data['paymentSum'] = Payment::getAllPayments();
		$data['billsum'] = Bill::getBillSum();
		$data['share'] = $data['billsum']/5;
		$data['payments'] = $payments;
		$data['myPayments'] = Payment::getAllPayments($user);

		$data['utilities'] = $utilities;

		return(view('App/bills',$data));
	}

	public function maintenance(Request $req) {

		$data['success'] = false;
		if ($req->type == 'maintenance') {
			$maintenance = new maintenance;

			$user_id = Auth::user()->id;
			$username = Tenant::where('id','=',$user_id)->first();
			$maintenance->tenant = $username->name;
			$maintenance->notes = $req->get('notes');
			$maintenance->active = true;

			$maintenance->save();
			$data['success'] = true;
		}

		$data['maintenance'] = Maintenance::all();
		$data['all'] = $data['maintenance']->count();
		$data['completed'] = Maintenance::getAllCompleted();
		$data['outstanding'] = $data['all'] - $data['completed'];

		return view('app/maintenance',$data);
	}

	public function deleteMaintenance(Request $req) {
		$data['request'] = true;
		return $data;
	}

	public function user() {
		$user = Auth::user();
		$data['user'] = $user;
		$tenant = Tenant::where('id','=',$user->tenant_id)->first();
		$data['tenant'] = $tenant;

		
		return ("Under construction");
		return view('app/user',$data);
	}

	public function updateUser($req) {

	}

	public function logout() {
		Auth::logout();
		return redirect('login');
	}

}