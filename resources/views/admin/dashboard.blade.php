@extends('layouts.dash')

@section('content')
            <div class="row">
                <div class="col-lg-9 main-chart">
                    <div class="">
                        <div class="col-md-12 col-sm-4 mb">
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>Your Status</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 col-xs-8">
                                        @if($bill < 0)
                                            <h1 class="text-danger">You owe <b>${{$bill}}</b></h1>
                                        @else
                                            <h1 class="text-success">You're ahead <b>${{$bill}}</b>!</h1>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-xs-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mtbox">

                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                            <div class="box1">

                                <span class="li_heart"></span>
                                <h3>Water</h3>
                                <h5>${{$bill}}</h5>
                            </div>
                            <p>This is how much you owe for water</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_cloud"></span>
                                <h3>Sewage</h3>
                            </div>
                            <p>48 New files were added in your cloud storage.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_stack"></span>
                                <h3>Electric</h3>
                            </div>
                            <p>You have 23 unread messages in your inbox.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_news"></span>
                                <h3>Gas</h3>
                            </div>
                            <p>More than 10 news were added in your reader.</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_data"></span>
                                <h3>Internet</h3>
                            </div>
                            <p>Your server is working perfectly. Relax & enjoy.</p>
                        </div>


                    </div><!-- /row mt -->


                    <div class="row mt">
                        <!-- SERVER STATUS PANELS -->
                        <div class="col-md-4 col-sm-4 mb">
                            <div class="white-panel pn donut-chart">
                                <div class="white-header">
                                    <h5>SUBMIT A PAYMENT</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                        <p><i class="fa fa-dollar"></i> 70%</p>
                                    </div>
                                </div>
                                <img src="../assets/img/SigTauShield.png"
                                <canvas id="serverstatus01" height="120" width="120">
                                </canvas>
                            </div><! --/grey-panel -->
                        </div><!-- /col-md-4-->


                        <div class="col-md-4 col-sm-4 mb">
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>SUBMIT A BILL</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                        <p><i class="fa fa-heart"></i> 122</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6"></div>
                                </div>
                                <div class="centered">
                                    <img src="../assets/img/SigTauShield.png" width="120">
                                </div>
                            </div>
                        </div><!-- /col-md-4 -->

                        <div class="col-md-4 col-sm-4 mb">
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <h5>SUBMIT AN EXPENSE</h5>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 goleft">
                                        <p><i class="fa fa-heart"></i> 122</p>
                                    </div>
                                    <div class="col-sm-6 col-xs-6"></div>
                                </div>
                                <div class="centered">
                                    <img src="../assets/img/SigTauShield.png" width="120">
                                </div>
                            </div>
                        </div>


                    </div><!-- /row -->

                    <div class="row mt">
                        <!--CUSTOM CHART START -->
                        <div class="border-head">
                            <h3>VISITS</h3>
                        </div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>10.000</span></li>
                                <li><span>8.000</span></li>
                                <li><span>6.000</span></li>
                                <li><span>4.000</span></li>
                                <li><span>2.000</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN</div>
                                <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">FEB</div>
                                <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">MAR</div>
                                <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR</div>
                                <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
                            </div>
                            <div class="bar">
                                <div class="title">MAY</div>
                                <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">JUN</div>
                                <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
                            </div>
                            <div class="bar">
                                <div class="title">JUL</div>
                                <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
                            </div>
                        </div>
                        <!--custom chart end-->
                    </div><!-- /row -->

                </div><!-- /col-lg-9 END SECTION MIDDLE -->


                <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->

                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <h3>RECENT PAYMENTS</h3>
                    @foreach($recent_payments as $payment)
                        <div class="desc">
                            <div class="thumb">
                                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <div class="details">
                                <p><muted>2 Minutes Ago</muted><br/>
                                    <a href="#">{{$payment->tenant_id}}</a> paid ${{$payment->amount}} to the {{ $payment->recipient_id }}.<br/>
                                </p>
                            </div>
                        </div>
                        @endforeach

                                <!-- USERS ONLINE SECTION -->
                        <h3>HOUSE MATES</h3>

                        @foreach($tenants as $tenant)
                            <div class="desc">
                                <div class="thumb">
                                    <img class="img-circle" src="assets/img/ui-divya.jpg" width="35px" height="35px" align="">
                                </div>
                                <div class="details">
                                    <p><a href="#">{{$tenant->name}}</a><br/>
                                        <muted>Available</muted>
                                    </p>
                                </div>
                            </div>
                            @endforeach

                                    <!-- CALENDAR-->
                            <div id="calendar" class="mb">
                                <div class="panel green-panel no-margin calendar">
                                    <div class="panel-body">
                                        <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                            <div class="arrow"></div>
                                            <h3 class="popover-title" style="disadding: none;"></h3>
                                            <div id="date-popover-content" class="popover-content"></div>
                                        </div>
                                        <div id="my-calendar"></div>
                                    </div>
                                </div>
                            </div><!-- / calendar -->

                </div><!-- /col-lg-3 -->
            </div><! --/row -->
        </section>
    </section>

@endsection