@extends('layouts.aside')

@section('content')
    <div class="columns mid-column">
        <div class="content column is-19">
            <div class="title is-2column">Tenants</div>
            @if (Auth::user()->role == 'Admin')
            <a href="/admin/add-tenant" class="button button-green submit-button is-primary">Add New Tenant</a>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th><abbr title="Position">Tenant ID</abbr></th>
                    <th><abbr title="Played">Name</abbr></th>
                    <th><abbr title="Month">Home</abbr></th>
                    <th><abbr title="Drawn">Move In Date</abbr></th>
                    <th><abbr title="Lost">Move Out Date</abbr></th>
                    <th><abbr title="Points">Active</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th><abbr title="Position">Tenant ID</abbr></th>
                    <th><abbr title="Played">Name</abbr></th>
                    <th><abbr title="Month">Home</abbr></th>
                    <th><abbr title="Drawn">Move In Date Date</abbr></th>
                    <th><abbr title="Lost">Move Out Date</abbr></th>
                    <th><abbr title="Points">Active</abbr></th>
                    <th>Additional Notes</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($tenants as $tenant)
                    <tr>
                        <th>{{$tenant->id}}</th>
                        <td><a href="#" title="Leicester City F.C.">{{$tenant->name}}</a>
                        </td>
                        <td>{{$home}}</td>
                        <td>{{$tenant->move_in_date}}</td>
                        <td>{{$tenant->move_out_date}}</td>
                        <td>{{$tenant->active}}</td>
                        <td>{{$tenant->notes}}</td>
                    </tr>
            @endforeach
        </div>
    </div>
@endsection