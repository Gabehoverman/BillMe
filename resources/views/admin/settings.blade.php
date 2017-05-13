@extends('layouts.aside')

@section('content')
<div class="content columns">
    <h1>Settings</h1>
    <div class="column is-12">
        <h2>Welcome to settings {{$user->name}}</h2>
        <h3>Your home is {{$home->name}}</h3>


    </div>
</div>
@endsection