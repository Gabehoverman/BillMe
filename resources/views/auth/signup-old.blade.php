<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>House Mate - Multi Tenant House Management</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css"/>

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro" rel="stylesheet">


</head>
<body>

<div class="wrapper signup-bg">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                
                <div class="card signup-card">
                    <div class="header" style="text-align: center">
                        <img style="padding:20px; text-align: center;" width="300px" src="/assets/img/housematelogodark.png">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li id='User' role="presentation" class="active"><a class="tab error" href="#user" aria-controls="user" role="tab" data-toggle="tab">User Information</a></li>
                            <li id='Home' role="presentation"><a class="tab" href="#home" aria-controls="home" role="tab" data-toggle="tab">Home Information</a></li>
                            <li id='Tenant' role="presentation"><a class="tab" href="#tenant" aria-controls="tenant" role="tab" data-toggle="tab">Tenant Information</a></li>
                        </ul>
                    </div>
                    
                    
                    <form action="/register/new" method="post" class="needs-validation">
                    <div class="content">
                                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="user">                           

                                <h3 class="title">User Information</h3>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name" required>
                                    <small id="nameHelp" class="form-text text-muted">So we know what to call you.</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                    <small id="passwordHelp" class="form-text text-muted">Think strong and secure.</small>
                                </div>
                                <a onclick="ToHome()" class="btn btn-secondary" href="#home" aria-controls="home" role="tab" data-toggle="tab">Next</a>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="home">

                                <h3 class="title">Home Information</h3>
                                <div class="form-group row">
                                    <div class="col-md-9">
                                        <label for="homeCode">Use House Code</label>
                                        <input type="text" class="form-control" id="homeCode" placeholder="Code">
                                        <small id="homeCodeHelp" class="form-text text-muted">One of your housemates will have sent this to you.</small>
                                    </div>
                                    <div class="la-ball-clip-rotate-multiple la-dark"></div>
                                    <div class=col-md-3>
                                        <button id="findButton" onclick="FindHome()" style='margin-top:25px' class="btn btn-secondary">Check</button>
                                    </div>
                                </div>
                                <h2>OR</h2>
                                <div class="form-group">
                                    <input id="homeId" name="homeId" type="hidden" value="">
                                    <label for="homeName">House Name</label>
                                    <input type="text" class="form-control" id="homeName" name="homeName" placeholder="Home Name" value="">
                                    <small id="homeNameHelp" class="form-text text-muted">Cleaver, Cool, or Querky.</small>
                                </div>
                                <div class="form-group">
                                    <label for="homeAddress">Address</label>
                                    <input type="text" class="form-control" id="homeAddress" placeholder="Home Address">
                                    <small id="homeAddressHelp" class="form-text text-muted">Helps your housemates find you.</small>
                                </div>
                                <a onclick="ToTenant()" class="btn btn-secondary" href="#tenant" aria-controls="home" role="tab" data-toggle="tab">Next</a>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="tenant">

                                <h3 class="title">Tenant Information</h3>
                                <div class="form-group">
                                    <label for="moveInDate">Move In Date</label>
                                    <input type="date" class="form-control" id="moveInDate" placeholder="Move In Date">
                                    <small id="moveInDateHelp" class="form-text text-muted">When did you move in.</small>
                                </div>
                                <div class="form-group">
                                    <label for="moveOutDate">Move Out</label>
                                    <input type="date" class="form-control" id="moveOutDate" placeholder="Move Out Data">
                                    <small id="moveOutDateHelp" class="form-text text-muted">When are you moving out.</small>
                                </div>
                                <button class="btn btn-secondary" value="submit">Submit</button>
                        </div>
                    </form>
                    </div>     
                </div>              
            </div>
        </div>
    </div>
</div>


</body>
<script>
    $(function(){
        var current = location.pathname;
        $('.nav li a').each(function(){
            var $this = $(this);
            var $that = $('.wrapper .nav li');
            // if the current path is like this link, make it active
            if($this.attr('href').indexOf(current) !== -1){
                $this.addClass('active-nav');
            }
        })
    })

    function FindHome() {
        var code = $('#homeCode').val();
        alert(code);
        $('#findButton').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:18px"></i>');
        $.ajax({
            url: '/app/home/check',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            data: {
                homeCode: code,
            },
            success: function( data, textStatus, jQxhr ){
                console.log(data);
                $('#homeName').val(data['name']);           
                $('#homeName').attr('disabled',true);
                $('#homeAddress').val(data['address']);    
                $('#homeAddress').attr('disabled',true); 
                $('$homeId').val(data['id']);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
            
        })
        $('#findButton').html('Check');
    }

    function ToTenant() {
        $('#User').removeClass('active');
        $('#Home').removeClass('active');
        $('#Tenant').addClass('active');
    }

    function ToHome() {  
        if( $('#name').val() == '') {
            $('#name').addClass('is-invalid');
            alert($(this));
            event.preventDefault();
            window.location = '#user';
        }
        $('#User').removeClass('active');
        $('#Home').addClass('active');
        $('#Tenant').removeClass('active');
    };

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
     })();

</script>

<!--   Core JS Files   -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        
<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>


<!--  Notifications Plugin    -->
<!--<script src="assets/js/bootstrap-notify.js"></script>-->

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="../assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="../../assets/js/demo.js"></script>

</html>
