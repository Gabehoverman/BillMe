<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> House Mate - Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" id="bulma" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../bulma/css/login.css">
    <link rel="stylesheet" type="text/css" href="/public/css/styles.css">
</head>
<body>
<div class="login-wrapper columns">
    <div class="column is-8 is-hidden-mobile hero-banner">
        <section class="hero is-fullheight is-dark">
            <div class="hero-body">
                <div class="container section">
                    <div class="has-text-right">
                        <h1 class="title is-1">Login</h1> <br>
                        <p class="title is-3">Secure User Account Login</p>
                    </div>
                </div>
            </div>
            <div class="hero-footer">
                <p class="has-text-centered">Image © Glenn Carstens-Peters via unsplash</p>
            </div>
        </section>
    </div>
    <div class="column is-4">
        <section class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="columns">
                        <div class="column is-8 is-offset-2">
                            <h1 class=" has-text-centered section">
                                <a href="/"><img src="../assets/img/HouseMateLogoDark.png"></a>
                            </h1>
                            <!-- AUTHO Login Form -->

                            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="login-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <p class="control has-icon has-icon-right">
                                        <input id="email" placeholder="Email" type="email" class="input email-input no-round" name="email" value="{{ old('email') }}" required autofocus>
                                        <span class="icon user">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </p>
                            </div>

                                </br>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <p class="control has-icon has-icon-right">
                                    <input id="password" placeholder="Password" type="password" class="input password-input no-round" name="password" required>
                                            <span class="icon user">
                                        <i class="fa fa-lock"></i>
                                        </span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </p>
                        </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <p class="control login">
                                            <button type="submit" class="button is-outlined is-large is-fullwidth no-round button-t">Login</button>
                                        </p>
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

</body>
</html>
