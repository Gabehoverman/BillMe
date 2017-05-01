@extends('layouts.app')

@section('content')

<h2>Hello World</h2>

    @foreach ($ten as $tenant)
        {{ Auth::user() }}
        {{ $tenant->name }}
        {{ $tenant->home_id }} <br>
    @endforeach

@endsection