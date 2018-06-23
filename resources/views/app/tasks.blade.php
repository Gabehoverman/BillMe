@extends('layouts/material-dash')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="header">
					<h4 class="title">Tasks & Todos</h4>
					<p class="category">Overview of your homes tasks and todos</p>
				</div>
				<div class="content">
                    <table class="table table-hover">
                        <thead>
                            <th>Active</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Time</th>
                            <th></th>
                            
                        </thead>
                        @foreach($tasks as $task)
                        <tbody id='{{ $task->id}}'  data-task="{{$task}}" class="tbody" data-toggle="modal" data-target="#GSCCModal">
                            @if( $task->completed == true )
                            <td><i  style="font-size: 15pt; color: #00d1b2" class="fa fa-check-circle"></i></td>
                            @else
                            <td><i  style="font-size: 15pt; color: #323c48" class="fa fa-times-circle"></i></td>
                            @endif
                            <td>{{ $task->title }} </td>
                            <td>{{ $task->description}}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($task->created_at))->diffForHumans() }}</td>
                            <td><i  style="font-size: 15pt; color: #323c48" class="fa fa-ellipsis-h"></i></td>
                        </tbody>
                        @endforeach
                            
                    </table>
					<div class="footer">
						<div class="legend">
							<i class="fa fa-circle text-green"></i> Complete
							<i class="fa fa-circle text-black"></i> Incomplete
						</div>
						<hr>
						<div class="stats">
							<i class="fa fa-history"></i> Updated 3 minutes ago
						</div>
					</div>
				</div>
			</div>
		</div>
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
        </script>
        <script>    
        $(".tbody").click(function(){
            var data = $(this).data('task');
            $('#myModalLabel').text(data.title);
            $('.modal-description').text(data.user_id);
            $('.modal-description').text(data.description);
        });
        </script>

        <div id="GSCCModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;  </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div style="height: 400px;" class="modal-body">
                <strong>Author:</strong>
                <p class="modal-author"></p>
                <strong>Description:</strong> 
                <p class="modal-description"></p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Edit</button>
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