<?php

namespace App\Http\Controllers;

use App\Helpers\ChartHelper;
use App\Models\Bill;
use App\Models\MaintenanceHelper;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\Utility;
use App\Models\Maintenance;
use App\Models\Alert;
use App\Models\AlertType;
use ConsoleTVs\Charts\Builder\Chart;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Home;
use Illuminate\Support\Facades\Hash;
use Mockery\CountValidator\Exception;

class AppController extends Controller
{

	/**
	 * Main dashboard page
	 */
	public function dashboard() {

		$data['pieChart'] = ChartHelper::PieChart();
		$data['maintenance'] = Maintenance::all();
		$data['chart'] = ChartHelper::UtilitiesChart();
		$data['alerts'] = Auth::user()->tenant->home->alerts->take(7);

		return view('app/dashboard',$data);
	}

	/**
	 * Tasks & Todo page
	 */
	public function tasks() {
		$data['tasks'] = Home::find(Auth::user())->tasks;
		$data['alerts'] = Alert::where('home_id', Auth::user()->home_id)->where('alert_type',AlertType::Task)->orWhere('alert_type',AlertType::TaskComment)->get();
		return view('app/tasks',$data);
	}

	/**
	 * Shows bills/payments page
	 * Saves bill/pamyent when there is a post request to it.
	 */
	public function bills(Request $req) {

		$data['success'] = false;
		$data['submission'] = "hello";
		if ($req->type == 'bill' ) {
			$bill = new Bill;
			

			$bill->amount = $req->get('amount', '');
			$bill->home_id = Auth::user()->tenant->home->id;
			$bill->date = new \DateTime($req->get("bill_date"));
			$bill->utility_id = $req->get('recipient','');
			$bill->image_url = "hello world";
			$bill->active = false;
			$bill->notes = $req->get('notes');

			$bill->save();
			$data['submission'] = 'bill';
			$data['success'] = true;

			Alert::createAlert(AlertType::Bill);
		} 
		 if ($req->type == 'payment') {
			$payment = new Payment;

			$payment->home_id = Auth::user()->home->id;
			$payment->user_id = Auth::user()->id;
			$payment->amount = $req->get('amount');
			$payment->date = new \DateTime($req->get("due_date"));
			$payment->image_url = 'null';
			$payment->active = true;
			$payment->notes = $req->get('notes');

			$payment->save();

			$data['submission'] = 'payment';
			$data['success'] = true;

			Alert::createAlert(AlertType::Payment);

		}
		
		try {
			$bills = Bill::all();
			$utilities = Utility::all();
			foreach($bills as $bill) {
				foreach($utilities as $util)
					if ($bill->utility_id == $util->id) {
						$bill['utility'] = $util->name;
					}
			}
			$data['bills'] = $bills;
		} catch (Exception $e) {
			
		}

		$payments = Home::find(Auth::user())->payments;

		// $payments = Payment::all();
		// foreach($payments as $payment) {
		// 	$tenant = Tenant::where('id','=',$payment->tenant_id)->first();
		// 	$payment['tenant'] =  $tenant->name;
		// 	foreach($utilities as $util) {
		// 		if ($payment->recipient_id == $util->id) {
		// 			$payment['utility'] = $util->name;
		// 		}
		// 	}
		// }
		
		$user = Auth::user();

		$data['paymentSum'] = Payment::getAllPayments();
		$data['billsum'] = Bill::getBillSum();
		$data['share'] = $data['billsum']/5;
		$data['payments'] = $payments;
		$data['myPayments'] = Payment::getAllPayments($user);

		$data['utilities'] = $utilities;
		return(view('app/bills',$data));
	}


	/** 
	 * Shows maintenance page
	 */
	public function maintenance(Request $req) {

		$data['success'] = false;
		if ($req->type == 'maintenance') {
			$maintenance = new maintenance;

			$user_id = Auth::user()->tenant_id;
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

	/**
	 * Show discussion page
	 */
	public function posts() {
		$data['posts'] = Home::find(Auth::user())->posts;
		$data['alerts'] = Home::find(Auth::user())->alerts->where('alert_type', AlertType::Post);
		$data['alerts'] = Alert::where('home_id', Auth::user()->home_id)->where('alert_type',AlertType::Post)->orWhere('alert_type',AlertType::PostComment)->get();
		return view('app/posts',$data);
	}

	/**
	 * Returns house view with accompanying data
	 */
	public function house() {
		$user = Auth::user();
		$home = Auth::user()->tenant->home;
		$data['tenants'] = $home->users;
		//return $data;
		return view('app/house', $data);
	}

	public function newHouse(Request $req) {
		return $req->all();
	}


	/**
	 * Asynchronous delete function
	 * End point of all delete requests.
	 */
	public function delete(Request $req) {
		$type = $req->input();

		//Check delete request type.
		if ($type['type']== 'bill') {

			try {
				$bill = Bill::find($req->id);
				$bill->delete();
				$response['code'] = 200;
			} catch (Exception $e) {
				$respose['code'] = 500;
				$response['error'] = $e;
			}
			return $response;

		} else if ($type['type'] == 'payment' ) {
			
			try {
				$payment = Payment::find($req->id);
				$payment->delete();
				$response['code'] = 200;
			} catch (Exception $e) {
				$respose['code'] = 500;
				$response['error'] = $e;
			}
			return $response;

		} else if ($type['type'] == 'maintenance')  {

			try {
				$maintenance = Maintenance::find($req->id);
				//$maintenance->delete();
				$response['code'] = 200;
			} catch (Exception $e) {
				$respose['code'] = 500;
				$response['error'] = $e;
			}
			return $response;

		} else {
			$response['code'] = 500;
			$response['error'] = "Unpermitted type";
		}
		
	}

	/**
	 * Shows user page and accompanying data
	 */
	public function user() {
		$user = Auth::user();
		$data['user'] = $user;
		$data['tenant'] = $user->tenant;
		$data['home'] = $user->tenant->home;

		return view('app/user',$data);
	}

	public function updateUser($req) {

	}

	public function logout() {
		Auth::logout();
		return redirect('login');
	}

	public function test() {

		$bill = Bill::all();
		$bill->utility();

		return ($bill);
	}

	/**
	 *  Finds home based on code and returns home
	 * 	Should call a get function on home and pass code value
	 *  Returns 200 error if home cannot be found
	 */
	public function checkHomeCode(Request $req) {
		$code = $req->input('homeCode');
		$home  = Home::findByCode($code);
		if ($home != null) {
			return json_encode(200);
		} else {
			return json_encode($home);
		}
		
	}
}