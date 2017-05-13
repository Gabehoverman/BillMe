@extends('layouts.aside')

@section('content')
    <div class="columns mid-column">
        <div class="content column is-19">
            <div class="title is-2column">Bills</div>
            <a href="/admin/add-bill" class="button button-green submit-button is-primary">Submit Bill</a>
            <table class="table">
                <thead>
                <tr>
                    <th><abbr title="Position">Bill ID</abbr></th>
                    <th>Utility</th>
                    <th><abbr title="Played">Amount</abbr></th>
                    <th><abbr title="Month">Month</abbr></th>
                    <th><abbr title="Won">Bill Date</abbr></th>
                    <th><abbr title="Drawn">Due Date</abbr></th>
                    <th><abbr title="Lost">View Bill</abbr></th>
                    <th><abbr title="Points">Paid</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Position">Bill ID</abbr></th>
                    <th>Utility</th>
                    <th><abbr title="Played">Amount</abbr></th>
                    <th><abbr title="Month">Month</abbr></th>
                    <th><abbr title="Won">Bill Date</abbr></th>
                    <th><abbr title="Drawn">Due Date</abbr></th>
                    <th><abbr title="Lost">View Bill</abbr></th>
                    <th><abbr title="Points">Paid</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($bills as $bill)
                <tr>
                    <th>{{$bill->id}}</th>
                    <td><a href="#" title="Leicester City F.C.">{{$bill->utility}}</a>
                    </td>
                    <td>${{$bill->amount}}</td>
                    <td>{{$bill->month}}</td>
                    <td>{{$bill->bill_date}}</td>
                    <td>{{$bill->due_date}}</td>
                    <td><a>{{$bill->image_url}}</a></td>
                    <td>{{$bill->active}}</td>
                    <td>{{$bill->notes}}</td>
                </tr>
                @endforeach
        </div>
    </div>
@endsection