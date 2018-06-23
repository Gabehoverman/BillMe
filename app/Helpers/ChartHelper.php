<?php

namespace App\Helpers;

use App\Models\Bill;
use App\Models\Utility;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Database\Eloquent\Model;

class ChartHelper {

	public static function UtilitiesChart() {

		$bill = Bill::where('date','=','2017-05-12')->get();

		$chart = Charts::multi('areaspline', 'highcharts')
		      ->title('Utilities')
		      ->colors(['#00d1b2', '#ffffff'])
		      ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday','Saturday', 'Sunday'])
		      ->dataset('Bills', [2, 6, 5, 5, 4, 10, 12])
		      ->dataset('Payments',  [1, 3, 4, 3, 3, 5, 4]);

		return $chart;
	}

	public static function PieChart() {
		$chart = Charts::create('donut', 'highcharts')
		               ->title('My nice chart')
		               ->labels(['First', 'Second'])
		               ->values([5,10])
		               ->dimensions(1000,500)
		               ->responsive(true);

		return $chart;
	}

}