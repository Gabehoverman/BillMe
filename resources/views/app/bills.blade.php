@extends('layouts/material-dash')

@section('content')
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
                            
                            @include('Viewpartials/button')

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
                                <tr id="{{$bill->id}}">
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->amount}}</td>
                                    <td>{{$bill->month}}</td>
                                    <td>{{$bill->utility}}</td>
                                    @if($bill->active == 1)
                                    <td><i class="fa fa-check"></i></td>
                                    @else
                                   <td><button onclick="myAlert({{$bill->id}})"><i class="fa fa-times"></i></button></td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <script>
                                function myAlert(id) {
                                    alert(id);
                                    var row = document.getElementById(id);
                                    console.log("{{csrf_token()}}")
                                    fetch('http://127.0.0.1:8000/app/maintenance/delete', {
                                        method: 'post',
                                        headers: {
                                            'X-XSRF-TOKEN': " {{csrf_token()}} "
                                        } 
                                    })
                                    .then((res) => res.json())
                                    .then((data) => {
                                        console.log(data);
                                    })
                            
                                    row.remove();
                                }
                            </script>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Payments</h4>
                            @include('viewpartials/payment-button')
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