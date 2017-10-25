<!doctype html>
<html lang="{{ config('app.locale') }}">
    <meta charset="utf-8">
    <title>House Mate | Multi-Tenant House Management Software</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta property="og:title" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css')}}">

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">


    <script src="{{ URL::asset('assets/js/modernizr-2.7.1.js')}}"></script>

</head>

<body>


<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="logo" href="index.html"><img width="150px" src="{{ URL::asset('assets/img/HouseMateLogoWhite.png')}}" alt="Logo"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Sign in</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</div>

<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <a href="index.html"><img width="200px" src="{{ URL::asset('assets/img/HouseMateLogoWhite.png') }}" alt="Logo"></a>
            </div>
            <div class="col-xs-6 signin text-right navbar-nav">
                <a href="#pricing" class="scroll"></a>&nbsp; &nbsp;<a href="login">Sign in</a>
            </div>
        </div>

        <div class="row header-info">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <h1 class="wow fadeIn">Multi Tenant House Management Software</h1>
                <br />
                <p class="lead wow fadeIn" data-wow-delay="0.5s">Manage all of your bills, payments,
                    and tenants for your house, all in one place.</p>
                <br />

                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="row">
                            <div class="col-xs-6 text-right wow fadeInUp" data-wow-delay="1s">
                                <a href="#be-the-first" class="btn btn-secondary btn-lg scroll">Learn More</a>
                            </div>
                            <div class="col-xs-6 text-left wow fadeInUp" data-wow-delay="1.4s">
                                <a href="#invite" class="btn btn-primary btn-lg scroll">Request Invite</a>
                            </div>
                        </div><!--End Button Row-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="mouse-icon hidden-xs">
    <div class="scroll"></div>
</div>

<section id="be-the-first" class="pad-xl">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
                <h2>All in one place.</h2>
                <p class="lead">Intuitive interfaces give you easy access to your data.</p>
            </div>
        </div>

        <div class="iphone wow fadeInUp" data-wow-delay="1s">
            <img src="{{ URL::asset('assets/img/flat-macbook-mockup.png')}}">
        </div>
    </div>
</section>

<section id="main-info" class="pad-xl">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <hr class="line purple">
                <h3>Track Bills</h3>
                <p>Track all of your monthly utility bills, household expenses, and other costs assocaited with your house.</p>
            </div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
                <hr  class="line blue">
                <h3>Record Payments</h3>
                <p>Keep track of who has paid for what, and evenly divide up your monthly house costs amongst tenents.</p>
            </div>
            <div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
                <hr  class="line yellow">
                <h3>Manage Tenents</h3>
                <p>Manage who lives in your house, when they moved in, and other useful information to keep up to date.</p>
            </div>
        </div>
    </div>
</section>


<!--Pricing-->
<section id="pricing" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pricing-container" data-wow-delay="1s">
                <h2 class="white">Accessable</h2>
                <p class="white">Our platform is built for the web, meaning it can be accessed from anywhere, at any time, on any device.</p>
                <br>
                <h2 class="white">Convenient</h2>
                <p class="white">An inutitive registation processe makes getting your team onboard and up and running quick and easy.</p>
                <br>
                <h2 class="white">Reliable</h2>
                <p class="white">Everyone in your house can access the platform on their time, saving you the time and effort of reminding them.</p>

            </div>

            <div class="col-md-6 pricing-container wow fadeInUp" data-wow-delay="1.3s">
                <br />
                <img width='400px' class="phone margin-50" src="{{ URL::asset('assets/img/iphone.png')}}">
            </div>

        </div>

    </div>
</section>

<section id="press" class="pad-sm">
    <div class="container">

        <div class="row margin-30 news-container">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
                <a href="#" target="_blank">
                    <p class="black">I use HouseMate to track my bills, payments, and other things associated with my home and it works great!<br />
                        <small><em>January 15, 2016</em></small></p>
                </a>
            </div>
        </div>

        <div class="row margin-30 news-container">
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
                <a href="#" target="_blank">
                    <p class="black">My roommates and I use HouseMate to track all of our bills and stay on top of our utility payments.<br />
                        <small><em>Feb 25, 2016</em></small></p>
                </a>
            </div>
        </div>

    </div>
</section>

<section id="invite" class="pad-sm light-gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h2 class="black">Get the invite</h2>
                <br />
                <p class="black">Sign up to receive an email invitation to the platform when we launch!</p>
                <br />

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
                        <form role="form">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Request Invite</button>
                        </form>
                    </div>
                </div><!--End Form row-->

            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">

        <div class="row">
            <div class="col-sm-8 margin-20">
                <ul class="list-inline social">
                    <li>Connect with us on</li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="col-sm-4 text-right">
                <p><small>Copyright &copy; 2016. All rights reserved. <br>
                        Created by <a href="http://GabeHoverman.com">Gabe Hoverman</a></small></p>
            </div>
        </div>

    </div>
</footer>


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="js/wow.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


</body>
</html>
