@extends('layouts/material-dash')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                        @if($success == true)  
                        <div class="alert alert-success alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> A new {{$submission}} has been added.
                              </div>
                        @endif
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Total Bills</h4>
                        </div>
                        <div class="content">
                            <h3>${{$billsum}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Total Payments</h4>
                        </div>
                        <div class="content">
                            <h3>${{$paymentSum}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Your Share</h4>
                        </div>
                        <div class="content">
                            <h3>${{$share}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Your Payments</h4>
                        </div>
                        <div class="content">
                            <h3>${{$myPayments}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Bills</h4>
                            
                            @include('ViewPartials/button')

                            <p class="category">Here is where all your bills will show.</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Amount</th>
                                <th>Month</th>
                                <th>Utility</th>
                                <th>Paid</th>
                                <th>Info</th>
                                </thead>
                                <tbody>
                                @foreach($bills as $bill)
                                <tr id="{{$bill->id}}">
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->amount}}</td>
                                    <td>{{$bill->month}}</td>
                                    <td>{{$bill->utility}}</td>
                                    
                                    @if($bill->active == 1)
                                    <td><i class="fa fa-check"></i></td>
                                    @else
                                  <td><i class="fa fa-times"></i></td>
                                    @endif
                                    <td>
                                        <!-- Default dropup button -->
                                        <div class="btn-group dropup">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="fa fa-info"></i>
                                            </button>
                                            <div class="dropdown-menu" style="min-width:100px; padding: 7px;">
                                                <!-- Dropdown menu links -->
                                                <button style="width: 80px;"  class="btn btn-danger" onclick="removeItem({{ $bill->id}}, 'bill')">Delete</button>
                                            </div>

                                        </div>
                                    </td>

                                   <!-- <td><button class="btn" onclick="myAlert({{ $bill->id }})"><i class="fa fa-info"></i></button></td> -->
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Payments</h4>
                            @include('ViewPartials/payment-button')
                            <p class="category">Here is where all your payments will show.</p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Utility</th>
                                <th>Approved</th>
                                <th>Info</th>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                <tr id="{{ $payment->id }}">
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->tenant}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->utility}}</td>
                                    @if($payment->active == 1)
                                        <td><i class="fa fa-check"></i></td>
                                    @else
                                        <td><i class="fa fa-times"></i></td>
                                    @endif
                                    <td>
                                            <!-- Default dropup button -->
                                            <div class="btn-group dropup">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                 <i class="fa fa-info"></i>
                                                </button>
                                                <div class="dropdown-menu" style="min-width:100px; padding: 7px;">
                                                    <!-- Dropdown menu links -->
                                                    <button style="width: 80px;"  class="btn btn-danger" onclick="removeItem({{ $payment->id}}, 'payment')">Delete</button>
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
        @include('ViewPartials/JsFunctions')



@endsection