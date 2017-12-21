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

	public function bills() {
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

	public function maintenance() {
		$data['maintenance'] = Maintenance::all();
		$data['all'] = $data['maintenance']->count();
		$data['completed'] = Maintenance::getAllCompleted();
		$data['outstanding'] = $data['all'] - $data['completed'];

		return view('app/maintenance',$data);
	}

	public function user() {
		$user = Auth::user();
		$data['user'] = $user;
		$data['tenant'] = Tenant::where('id','=',$user->tenant_id)->first();
		$data['home'] = Home::where('id','=',$data['tenant']->home_id)->first();

		return view('app/user',$data);
	}

	public function updateUser($req) {

	}

	public function logout() {
		Auth::user()->$this->logout();
		return redirect()->route('login');
	}

}