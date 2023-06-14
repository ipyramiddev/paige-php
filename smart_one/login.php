<?php

//echo password_hash("9525444544", PASSWORD_DEFAULT);


session_start();


if (isset($_SESSION['user_logged_in'])) {
    header('Location: dashboard');
}

?>

<html>

<head>


    <title>Laposte - Login</title>

    <link rel="icon" type="image/png" sizes="16x16" href="favi.png">


    <link rel="stylesheet" href="assets/css/style2.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">

    <link rel="stylesheet" href=" 	https://use.fontawesome.com/releases/v5.7.2/css/all.css">


</head>

<body>


    <div class="wrapper bg-white">
        <div class="h2 text-center">Login Area</div>
        <div class="h4 text-muted text-center pt-2">Enter your login details</div>
        <form id="login-form" method="POST" action="auth.php" class="pt-3">
            <div id="error-msg" class="alert alert-danger" role="alert"></div>
            <div id="progress-loading" style="text-align:center;"><img style="width:60px; height:80px;" src="loading.gif" /></div>

            <div class="form-group py-2">
                <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" value="" placeholder="Username" required name="username" id="username" class=""> </div>
            </div>
            <div class="form-group py-1 pb-2">
                <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" value="" placeholder="Password" required class="" name="password" id="password">  <span class="far fa-eye-slash"></span>  </div>
            </div>
            <div class="d-flex align-items-start">
                <!--  <div class="remember"> <label class="option text-muted"> Remember me <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                <div class="ml-auto"> <a href="#" id="forgot">Forgot Password?</a> </div> -->
            </div> <button id="btnSubmit" class="btn btn-block text-center my-3">Log in</button>
            <!-- <div class="text-center pt-3 text-muted">Not a member? <a href="#">Sign up</a></div> -->
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <script>
        $(function() {
            //$("#error-msg").hide();
            //$("#progress-loading").hide();
            $('#btnSubmit').click(function(e) {

                $("#error-msg").hide();
            $("#progress-loading").hide();

                let self = $(this);

                e.preventDefault(); // prevent default submit behavior

                self.prop('disabled', true);

                var data = $('#login-form').serialize(); // get form data

                // sending ajax request to login.php file, it will process login request and give response.
                $.ajax({
                    url: 'auth.php',
                    type: "POST",
                    data: data,

                    beforeSend: function() {
						$("#progress-loading").show();
					},
                    complete: function(){


                       $("#progress-loading").hide();


					},

                }).done(function(res) {
                    res = JSON.parse(res);
                    if (res['status']) // if login successful redirect user to secure.php page.
                    {


                       window.location.href = "dashboard.php";


                    } else {

                        var errorMessage = '';
                        // if there is any errors convert array of errors into html string,
                        //here we are wrapping errors into a paragraph tag.
                        console.log(res.msg);
                        $.each(res['msg'], function(index, message) {
                            errorMessage += '<div>' + message + '</div>';
                        });
                        // place the errors inside the div#error-msg.
                        $("#error-msg").html(errorMessage);
                        // show it on the browser, default state, hide
                       $("#error-msg").show();
                        // remove disable attribute to the login button,
                        //to prevent multiple form submissions
                        //we have added this attribution on login from submit
                        self.prop('disabled', false);
                    }
                }).fail(function() {
                    alert("error");
                }).always(function() {
                    self.prop('disabled', false);
                });
            });
        });
    </script>


</body>

</html>
