@extends('layouts/material-dash')

@section('content')
	{!! Charts::assets() !!}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="header">
					<h4 class="title">Bills</h4>
					<p class="category">Overview of bills and payments</p>
				</div>
				<div class="content">
					{!! $chart->render() !!}
					<div class="footer">
						<div class="legend">
							<i class="fa fa-circle text-green"></i> Billed
							<i class="fa fa-circle text-silver"></i> Paid
						</div>
						<hr>
						<div class="stats">
							<i class="fa fa-history"></i> Updated 3 minutes ago
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="header">
					<h4 class="title">Recent Activity</h4>
					<p class="category">Everything that's happening in your house.</p>
				</div>
				<div class="content">
					<!--{!! $pieChart->render() !!}-->
					<div class="table-full-width">
						<table class="table">
							<tbody>
							<thead>
                                <th>ID</th>
								<th>Details</th>
                                <th>Time</th>
                                </thead>
							@foreach ($alerts as $alert)
							<tr>
								<td> {{ $alert->id }}</td>
								<td>
									{{  $alert->user->first_name.' '.$alert->notes }}
								</td>
								<td>
									{{ \Carbon\Carbon::createFromTimeStamp(strtotime($alert->created_at))->diffForHumans() }}
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<div class="footer">
						<div class="legend">
							<i class="fa fa-circle text-green"></i> Completed
							<i class="fa fa-circle text-black"></i> Incomplete
						</div>
						<hr>
						<div class="stats">
							<i class="fa fa-clock-o"></i> Updated 3 minutes ago.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-6">
			<div class="card ">
				<div class="header">
					<h4 class="title">Utilities</h4>
					<p class="category">Breakdown of Utilities</p>
				</div>
				<div class="content">
					<div id="chartActivity" class="ct-chart"></div>

					<div class="footer">
						<div class="legend">
							<i class="fa fa-circle text-info"></i> Overall
							<i class="fa fa-circle text-danger"></i> Paid
						</div>
						<hr>
						<div class="stats">
							<i class="fa fa-check"></i> Data information certified
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="card ">
				<div class="header">
					<h4 class="title">Maintenance</h4>
					<p class="category">A list of maintenance requests</p>
				</div>
				<div class="content">
					<div class="table-full-width">
						<table class="table">
							<tbody>
							@foreach ($maintenance as $m)
							<tr>
								<td> {{ $m->id }}</td>
								<td> {{ $m->user->first_name }} </td>
								<td>
									{{ $m->notes }}
								</td>
								<td class="td-actions text-right">
									<button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
										<i class="fa fa-edit"></i>
									</button>
									<button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
										<i class="fa fa-times"></i>
									</button>
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>

					<div class="footer">
						<hr>
						<div class="stats">
							<i class="fa fa-history"></i> Updated 3 minutes ago
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection