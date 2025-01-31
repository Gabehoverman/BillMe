@extends('layouts.aside')

@section('content')
    <div class="columns mid-column">
<div class="content column is-11">
    <div class="title is-2">Welcome to House Mate!</div>
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-18">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child box">
                        <h3>This Month's Utilities</h3>
                        <h1><a class="green">${{$monthly_util_sum}}</a></h1>
                    </article>
                    <article class="tile is-child box">
                        <h3>This Month's Payments</h3>
                        <h1><a class="green">${{$monthly_util_sum/5}}</a></h1>
                    </article>
                </div>
                <div class="tile is-parent is-8">
                    <article class="tile is-child box">
                        <div class="columns">
                            <div class=" column">
                               <h2>Status</h2>
                                @if ($bill < 0)
                                    <div class="content">
                                        <h1><a class="red">You owe ${{$bill * -1}}</a></h1>
                                    </div>
                                @else
                                    <div class="content">
                                        <h1><a class="red">You're ahead ${{$bill}}</a></h1>
                                    </div>
                                @endif
                                <footer class="modal-card-foot">
                                    <a href="bills" class="button button-success">View Bills</a>
                                    <a href="add-bill" class="button button-success">Submit Bill</a>
                                    <a href="payments" class="button button-success">View Payments</a>
                                    <a href="add-payment" class="button button-success">Submit Payment</a>
                                </footer>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h2 class="center">Outstanding Balances</h2>
                    <div class="column">
                        <nav class="level is-mobile">
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Water</p>
                                    <p class="title mobile">${{$totalUtil['Water']}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Sewage</p>
                                    <p class="title mobile">${{$totalUtil['Sewage']}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Electric</p>
                                    <p class="title mobile">${{$totalUtil['Electric']}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Gas</p>
                                    <p class="title mobile">${{$totalUtil['Gas']}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Internet</p>
                                    <p class="title mobile">${{$totalUtil['Internet']}} </p>
                                </div>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
        </div>
    </div>
</div>
    </div>


@endsection