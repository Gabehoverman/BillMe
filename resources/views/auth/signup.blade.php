<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>House Mate | Registration</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/light-bootstrap-dashboard.css" rel="stylesheet">
    <link href="/assets/css/signup.css" rel="stylesheet"> 

  </head>

  <body class="bg-light signup-bg">

    <div class="container bg-white signup-wrapper col-md-9">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="../assets/img/houseMateLogoDark.png" width="300px">
        <div class="progress">
          <div class="progress-bar progress-1" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <p class="lead">Complete the registration process below to get started using HouseMate and manage your house like a pro!</p>
      </div>

      <!-- USER REGISTRATION FORM  -->
      <div id="user" class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">User Information</h4>
          <form id="user-form" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="Bob" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="Jones" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="password-verify">Verify Password</label>
                <input type="password" class="form-control" id="password-verify" placeholder="Password" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
              
            <hr class="mb-4">
            <button class="btn btn-secondary btn-lg btn-block">Continue</button>
          </form>
        </div>
      </div>

      <!-- HOME REGISTRATION FORM -->
      <div id="home" class="row invisible">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Home Information</h4>
          <form id="home-code-form" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-9 mb-3">
                <label for="homeCode">Enter the invite code your friends gave you</label>
                <input type="text" class="form-control" id="homeCode" placeholder="12345678" value="" required>
                <div class="invalid-feedback">
                  Could not find a home with that code.
                </div>
              </div>
              <div style="padding-top: 2rem;" class="col-md-3">
                <a id="FindButton" style="padding: 6px 26px; color: white" class="btn btn" onclick="FindHome()">Check</a>
              </div>
              <div class="col-md-12">
                <a class="mt-2" href="#" onclick='ShowHouseForm()'>Setting up a new home?</a>
              </div>
              </div>
            </form>
              
            <div id="home-form-div" class="invisible">
            <form id="home-form" class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-12 mb-3">
              
                <label for="homeName">New Home Name</label>
                <input id="homeId" name="homeId" type="hidden" value="">
                <input type="text" class="form-control" id="homeName" placeholder="Ex: Bear's Big Blue House" value="" required>
                <div class="invalid-feedback">
                  A valid home name is required.
                </div>
              </div>
            </div>
            </div>
           
            <hr class="mb-4">
            <button class="btn btn-secondary btn-lg btn-block" type="submit">Continue</button>
          </form>
        </div>
      </div>

      <!-- TENANT REGISTRATION FORM -->
      <div id="tenant" class="row invisible">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Tenant Information</h4>
          <form id="tenant-form" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="moveInDate">Move In Date</label>
                <input type="date" class="form-control" id="moveInDate" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <label for="moveOutDate">Move Out Date</label>
                <input type="date" class="form-control" id="moveOutDate" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
          
            <hr class="mb-4">
            <button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button>
          </form>
        </div>
      </div>

      <div id="success" class="row invisible">
        <div class="col-md-12 order-md-1">
            <div class="checkmark">
              <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                <path class="path" fill="none" stroke="#00d1b2" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"/>
                <circle class="path" fill="none" stroke="#00d1b2" stroke-width="4" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"/>
                <polyline class="path" fill="none" stroke="#00d1b2" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="113,52.8 
                74.1,108.4 48.2,86.4 "/>
              <circle class="spin" fill="none" stroke="#00d1b2" stroke-width="4" stroke-miterlimit="10" stroke-dasharray="12.2175,12.2175" cx="80.6" cy="80.6" r="73.9"/>
            </svg>
          </div>
          <div style="text-align: center">
            <h1>All Done!</h1>
            <p>Log in to your new account to start managing your home.</p>
            <a class="btn btn-secondary" href="/login">Login</a>
            
            </div>
        </div>
      </div>

      <footer class="pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/assets/js/vendor/popper.min.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
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
              } else {
                event.preventDefault();
                event.stopPropagation();
                navigate(form.id);
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

      function navigate(id) {

        if (id === 'user-form') {
          if($('#password').val() != $('#password-verify').val()) {
            console.log('error');
            alert("Passwords must match");
            return;
          }

          $('#user').addClass('invisible');
          $('#home').removeClass('invisible');
          $('.progress-bar').removeClass('progress-1');
          $('.progress-bar').addClass('progress-2');

        } else if (id === 'home-form') {

          $('#home').addClass('invisible');
          $('#tenant').removeClass('invisible');
          $('.progress-bar').removeClass('progress-2');
          $('.progress-bar').addClass('progress-3');

        } else if (id === 'tenant-form') {

          $('#tenant').addClass('invisible');
          $('#success').removeClass('invisible');
          $('.progress-bar').removeClass('progress-3');
          $('.progress-bar').addClass('progress-4');

          GetFormData();

        } else {
          //error
        }
      }

      function ShowHouseForm() {
        $('#home-form-div').removeClass("invisible");
      }

      function FindHome() {
        var code = $('#homeCode').val();
        alert(code);
        $('#findButton').html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:18px"></i>');
        $.ajax({
            url: '/app/home/check',
            method: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': {{csrf_token()}}
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
                $('#homeId').val(data['id']);
            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
            
        })
        $('#findButton').html('Check');
    }

    function GetFormData() {
      var formData = {
        "firstName": $('#firstName').val(),
        "lastName": $('#lastName').val(),
        "password" : $('#password').val(),
        "email": $('#email').val(),
        "homeId": $('#homeId').val(),
        "homeName": $('#homeName').val(),
        "moveInDate": $("#moveInDate").val(),
        "moveOutDate": $('#moveOutDate').val()
      }
      alert(JSON.stringify(formData));
      SendData(formData);
    };

    function SendData(formData) {

        fetch("/register/new",
        {
          method: "POST",
          body: JSON.stringify(formData),
          credentials: 'same-origin',
          headers: new Headers({
            'Content-Type': 'application/json',
          })
        })
        .then(function(res){ return res.json(); })
        .then(function(data){ 
          console.log( data ) 
        }).catch(function(error) {
          console.log(error);
        });

    }


    </script>
  </body>
</html>