<!DOCTYPE html>
<html>
<?php 
session_start();
include 'user_login.php';

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixtone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container-fluid"><a class="navbar-brand" href="index.php">M<em>i</em>xT<em>o</em>n<em>e</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php">Contact Us</a></li>
                </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="index.php">Sign Up</a></span></div>
        </div>
    </nav>
    <div class="login-dark" style="background-image:url(&quot;assets/img/star-sky.jpg&quot;);">
        <form method="post" style="margin-top:-154px; padding-bottom: 40px;">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration" style="padding-bottom: 30px;"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group" style="padding-bottom: 30px;"> <p style ="color:#2980ef; margin-left: 5px; padding-bottom: 5px;"><?php echo $wrong;?> </p><input class="form-control" type="email" name="email" required="required" autofocus="" placeholder="Email" autocomplete="on"></div>
            <div class="form-group" style="padding-bottom: 30px;"><input class="form-control" type="password" name="password" required="required" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name = "login">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>