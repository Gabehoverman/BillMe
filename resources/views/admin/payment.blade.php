@extends('layouts.aside')

@section('content')
    <div class="columns mid-column">
        <div class="content column is-19">
            <div class="title is-2column">Payments</div>
            <a href="/admin/add-payment" class="button button-green submit-button is-primary">Submit Payment</a>
            <table class="table">
                <thead>
                <tr>
                    <th><abbr title="Position">Payment ID</abbr></th>
                    <th>Utility</th>
                    <th><abbr title="Played">Amount</abbr></th>
                    <th><abbr title="Tenant">Tenant</abbr></th>
                    <th><abbr title="Won">Payment Date</abbr></th>
                    <th><abbr title="Lost">View Receipt</abbr></th>
                    <th><abbr title="Points">Approved</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Position">Payment ID</abbr></th>
                    <th>Utility</th>
                    <th><abbr title="Played">Amount</abbr></th>
                    <th><abbr title="Tenant">Tenant</abbr></th>
                    <th><abbr title="Won">Payment Date</abbr></th>
                    <th><abbr title="Lost">View Receipt</abbr></th>
                    <th><abbr title="Points">Approved</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <th>{{$payment->id}}</th>
                        <td><a href="#" title="Leicester City F.C.">{{$payment->utility}}</a>
                        </td>
                        <td>${{$payment->amount}}</td>
                        <td>{{$payment->tenant}}</td>
                        <td>{{$payment->payment_date}}</td>
                        <td><a>{{$payment->image_url}}</a></td>
                        <td>{{$payment->active}}</td>
                        <td>{{$payment->notes}}</td>
                    </tr>
            @endforeach
        </div>
    </div>
@endsection