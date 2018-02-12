@extends('layouts/material-dash')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if($success == true)  
                <div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> A new maintenance request has been added.
                      </div>
                @endif
            </div>
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
                        
                        @include('ViewPartials/maintenance-button')

                        <p class="category">Here is where the maintenance requests are stored.</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Tenant</th>
                            <th>Notes</th>
                            <th>Completed</th>
                            <th>Info</th>
                            </thead>
                            <tbody>
                            @foreach($maintenance as $m)
                                <tr id="{{ $m->id }}">
                                    <td>{{$m->id}}</td>
                                    <td>{{$m->tenant}}</td>
                                    <td>{{$m->notes}}</td>
                                    @if($m->active == 1)
                                        <td><i class="fa fa-times"></i></td>
                                    @else
                                        <td><i class="fa fa-check"></i></td>
                                    @endif
                                    <td>
                                            <!-- Default dropup button -->
                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="fa fa-info"></i>
                                                </button>
                                                <div class="dropdown-menu" style="min-width:100px; padding: 7px;">
                                                    <!-- Dropdown menu links -->
                                                    <button style="width: 80px;"  class="btn btn-danger" onclick="removeItem({{ $m->id}}, 'maintenance')">Delete</button>
                                                </div>
                                            </div>
                                        </td>
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