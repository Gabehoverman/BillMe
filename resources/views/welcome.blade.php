<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>House Mate - Multi Tenant House Management Software</title>
        <link rel="shortcut icon" href="../assets/img/Favicon.png" type="image/x-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="../bulma/css/bulma.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./public/css/styles.css">
        <link rel="stylesheet" href="/public/bulma/css/bulma.css">
        <link rel="stylesheet" type="text/css" src="{{ URL::asset('bulma/css/bulma.css') }}">


        <!-- Styles -->

    </head>
    <body>
    <section class="hero is-success is-fullheight" id="welcome-hero">
        <!-- Hero header: will stick at the top -->
        <div class="hero-head">
            <header class="nav">
                <div class="container">
                    <div class="nav-left">
                        <a class="nav-item">
                            <img src="../assets/img/HouseMateLogo.png" alt="Logo">
                        </a>
                    </div>
                    <span class="nav-toggle">
                      <span></span>
                      <span></span>
                      <span></span>
                    </span>
                    <div class="nav-right nav-menu">
                        <a class="nav-item is-active">
                            Home
                        </a>
                        <a class="nav-item is-active">
                            About
                        </a>
                        <a class="nav-item is-active">
                            Contact
                        </a>
                        @if(Route::has('login'))
                            @if (Auth::check())
                              <span class="nav-item">
                                <a href="{{ url('/admin/dashboard') }}" class="button button-white">
                                  <span class="icon">
                                    <i class="fa fa-github"></i>
                                  </span>
                                    <span>Dashboard</span>
                                </a>
                              </span>
                            @else
                                <span  class="nav-item">
                                <a href="{{ url('login') }}" id="login-button" class="button button-white login-button">
                                    <span>Login</span>
                                </a>
                              </span>
                        @endif
                    @endif
                    </div>
                </div>
            </header>
        </div>

        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            <div class="container has-text-left">
                <h1 class="title">
                    Multi Tenant House Management Software.
                </h1>
                <hr id="hr">
                <h2 class="subtitle">
                    Manage all of your bills, payments, and more, all in one convenient place.
                </h2>
                <a class="button button-white">
                    Sign Up Today
                </a>
            </div>
        </div>
    </section>
    <section class="blurbs">
    <div class="columns">
        <div class="column center blurb">
            <img width="100px" src="../assets/img/plug.png">
            <h1 class="title">Utilities</h1>
            <p>Manage your utilities, bills, and payments all at once.</p>
        </div>
        <div class="column center blurb">
            <img width="100px" src="../assets/img/users.png">
            <h1 class="title">Chores</h1>
            <p>Set up chore lists, tasks, and more to keep your house in order.</p>
        </div>
        <div class="column center blurb">
            <img width="70px" src="../assets/img/DollarIcon.png">
            <h1 class="title">Expenses</h1>
            <p>Track your expenses, cost, and debt associated with your household.</p>
        </div>
    </div>
    </section>
    <section class="hero is-primary is-medium medium-shot medium-shot-bg">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title">
                    Manage your house from anywhere
                </h1>
                <hr style="margin: 50px auto;">
                <h2 class="subtitle">
                    House Mate allows you to manage your expenses, utilities, and everything else you need from anywhere in the world.
                </h2>
            </div>
        </div>
    </section>
    <section class="hero has-text-centered email-section medium-shot">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                     Registration Is Closed
                </h1>
                <h2 class="subtitle">
                    Enter your email address below to be the first to know when it opens back up.
                </h2>
                <div class="email-container">
                    <input placeholder="Email Address" class="email-input" type="text">
                    <button class="button button-azure">Submit</button>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container">
            <div class="columns has-text-centered">
                <div class="column">
                    <img width="200px" src="../assets/img/HouseMateLogo.png">
                </div>
                <div class="column">
                    <h1>Contact</h1>
                </div>
                <div class="column">
                    <h1>About</h1>
                </div>
                <div class="column">
                    <h1>Account</h1>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
