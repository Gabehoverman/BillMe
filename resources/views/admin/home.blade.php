@extends('layouts.aside')

@section('content')
    <div class="columns mid-column">
<div class="content column is-11">
    <div class="title is-2">Dashboard</div>
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-18">
            <div class="tile">
                <div class="tile is-parent is-vertical">
                    <article class="tile is-child box">
                        <h3>Total Monthly Utilities</h3>
                        <h1><a class="green">${{$monthly_util_sum}}</a></h1>
                    </article>
                    <article class="tile is-child box">
                        <h3>Your Share</h3>
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
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h2 class="center">Current Month's Utilities</h2>
                    <div class="column">
                        <nav class="level is-mobile">
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Water</p>
                                    <p class="title">${{$eachUtil['Water']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Sewage</p>
                                    <p class="title">${{$eachUtil['Sewage']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Electric</p>
                                    <p class="title">${{$eachUtil['Electric']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Gas</p>
                                    <p class="title">${{$eachUtil['Gas']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Internet</p>
                                    <p class="title">${{$eachUtil['Internet']->amount}} </p>
                                </div>
                            </div>
                        </nav>
                    </div>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h2 class="center">Previous Month's Utilities</h2>
                    <div class="column">
                        <nav class="level is-mobile">
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Water</p>
                                    <p class="title">${{$prevUtil['Water']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Sewage</p>
                                    <p class="title">${{$prevUtil['Sewage']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Electric</p>
                                    <p class="title">${{$prevUtil['Electric']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Gas</p>
                                    <p class="title">${{$prevUtil['Gas']->amount}}</p>
                                </div>
                            </div>
                            <div class="level-item has-text-centered">
                                <div>
                                    <p class="heading">Internet</p>
                                    <p class="title">${{$prevUtil['Internet']->amount}} </p>
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