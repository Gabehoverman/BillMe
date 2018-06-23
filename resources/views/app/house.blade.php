@extends('layouts/material-dash')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">House Name</h4>
                        </div>
                        <div class="content">
                            <h3>Sig Tau</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Number of Tenants</h4>
                        </div>
                        <div class="content">
                            <h3>1</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Go Pro</h4>
                        </div>
                        <div class="content">
                            <a class="btn btn-secondary">Upgrade To Pro</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Tenants</h4>
                            

                            <p class="category">Here is a list of all f the people who live in your house.</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                                </thead>
                                <tbody>
                                @foreach($tenants as $t)
                                <td>{{  $t->id  }}</td>
                                <td>{{  $t->first_name  }}</td>
                                <td>{{  $t->email }}</td>
                                <td><a style="font-size:15px;"><i  style="font-size:15px;" class="fa fa-ellipsis-h"></i></a></td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Address</h4>
                            <p class="category">The current address for your house.</p>
                            <hr>
                        </div>
                        <div style="padding-top: 0;" class="content">
                            <p class="">1349 6th Avenue, </p>
                            <p class="">Huntington, WV 25701</p>
                            <hr>
                        </div>
                        <div style="height: 50px;" class="card-footer">
                            <a style="margin: 0px 15px 15px 0px; float: right;" class="btn btn-secondary">Update</a>
                        </div>
                    </div>
                </div>
            </div>

             <div class="row">                             
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Landlord Information</h4>
                            <p class="category">Here is a list of all of the people who live in your house.</p>
                            <hr>
                        </div>
                        <div class="content">
                            <h5 class="">Email:Hoverman@Marshall.edu</h5>
                            <h5 class="">Phone: (989) 488-3099</h5>
                            <hr>
                        </div>
                        <div style="height: 50px;" class="card-footer">
                            <a style="margin: 0px 15px 15px 0px; float: right;" class="btn btn-secondary">Contact</a>
                        </div>
                    </div>
                </div>
            </div>

            </div>

            <!--<div class="row">
                @foreach($tenants as $t)
                             
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ $t->name }}</h4>
                            <p class="category">Here is a list of all of the people who live in your house.</p>
                            <hr>
                        </div>
                        <div class="content">
                            <h5 class="">Email:{{ $t->email }} Hoverman@Marshall.edu</h5>
                            <h5 class="">Phone: (989) 488-3099</h5>
                            <hr>
                        </div>
                        <div style="height: 50px;" class="card-footer">
                            <a style="margin: 0px 15px 15px 0px; float: right;" class="btn btn-secondary">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>-->

        @include('ViewPartials/JsFunctions')



@endsection