@extends('layouts/material-dash')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance Requests</h4>
                    </div>
                    <div class="content">
                        <h3>{{$all}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Completed Requests</h4>
                    </div>
                    <div class="content">
                        <h3>{{$completed}}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Outstanding Requests</h4>
                    </div>
                    <div class="content">
                        <h3>{{$outstanding}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Maintenance</h4>
                        <button style="float: right; margin-top: -25px;"class="btn">Submit Request</button>

                        <p class="category">Here is where the maintenance requests are stored.</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Tenant</th>
                            <th>Notes</th>
                            <th>Completed</th>
                            </thead>
                            <tbody>
                            @foreach($maintenance as $m)
                                <tr>
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->tenant}}</td>
                                    <td>{{$m->notes}}</td>
                                    @if($m->active == 1)
                                        <td><i class="fa fa-times"></i></td>
                                    @else
                                        <td><i class="fa fa-check"></i></td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection