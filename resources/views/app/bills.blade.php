@extends('layouts/material-dash')

@section('content')
        <div class="container-fluid">
            <div class="row">
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
                            <button style="float: right; margin-top: -25px;"class="btn">Add Bill</button>

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
                                </thead>
                                <tbody>
                                @foreach($bills as $bill)
                                <tr>
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->amount}}</td>
                                    <td>{{$bill->month}}</td>
                                    <td>{{$bill->utility}}</td>
                                    @if($bill->active == 1)
                                    <td><i class="fa fa-check"></i></td>
                                    @else
                                    <td><i class="fa fa-times"></i></td>
                                    @endif
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
                            <button style="float: right; margin-top: -25px;"class="btn btn">Add Payment</button>
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
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td>{{$payment->id}}</td>
                                    <td>{{$payment->tenant}}</td>
                                    <td>{{$payment->amount}}</td>
                                    <td>{{$payment->utility}}</td>
                                    @if($bill->active == 1)
                                        <td><i class="fa fa-check"></i></td>
                                    @else
                                        <td><i class="fa fa-times"></i></td>
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