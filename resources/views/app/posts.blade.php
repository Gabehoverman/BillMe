@extends('layouts/material-dash')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="header">
					<h4 class="title">Discussions</h4>
					<p class="category">Overview of posts and discussions</p>
				</div>
				<div class="content">
                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Time</th>
                            <th>Options</th>
                        </thead>
                        @foreach($posts as $post)
                        <tbody>
                            <td>{{ $post->title }} </td>
                            <td>{{ $post->description}}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</td>
                            <td><i  style="font-size: 15pt; color: #323c48" class="fa fa-ellipsis-h"></i></td>
                        </tbody>
                        @endforeach
                    </table>
					<div class="footer">
						<div class="legend">
							<i class="fa fa-circle text-green"></i> Active
							<i class="fa fa-circle text-silver"></i> Non-Active
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
					<div class="table-full-width">
						<table class="table">
							<tbody>
							<thead>
                                <th>ID</th>
								<th>Details</th>
                                <th>Time</th>
                                </thead>
							</tbody>
                            @foreach($alerts as $alert)
                            <tbody>
                                <td>{{ $alert->id }}</td>
                                <td>{{ $alert->user->first_name.' '.$alert->notes }}</td>
                                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($alert->created_at))->diffForHumans() }}</td>
                            </tbody>
                            @endforeach
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
</div>



@endsection