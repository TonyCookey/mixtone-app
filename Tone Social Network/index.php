<!DOCTYPE html>
<html>
<?php
include 'user_insert.php';
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
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="index.php">M<em>i</em>xT<em>o</em>n<em>e</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="about.html">About Us</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    </ul><span class="navbar-text actions"> <a href="login.php" class="login">Log In</a><a class="btn btn-light action-button" role="button" href="index.php">Sign Up</a></span></div>
    </div>
    </nav>
    </div>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" action="">
                <h2 class="text-center"><strong>Create</strong> an account.</h2>
                <div class="form-group"><input class="form-control" type="text"name="name" placeholder="Full Name" required="required" style="margin-bottom:15px;">  </div>
                    <div class="form-group">  <input class="form-control" type="email" name="email" placeholder="Email" required="required"><p style ="color:red; margin-left: 5px; font-size: 11px;"><?php echo $used_email;?> </p> </div>
              
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required="required">  <p style ="color:red; margin-left: 5px; font-size: 11px;"><?php echo $pass_wrong;?> </p></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)" required="required"> <p style ="color:red; margin-left: 5px;  font-size: 11px;"><?php echo $pass_match;?> </p></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" name="check" value="no" type="checkbox" required="required" checked="checked">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name= "signup">Sign Up</button></div>
                <a href="login.php" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
    <div class="highlight-phone">
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="margin-top:104px;">
                    <div class="intro">
                        <h2>Mixtone</h2>
                        <p>Mixtone is the Latest Social Network for broadcasting your inspiring thoughts and views to a welcoming audience</p><a class="btn btn-primary btn-lg" role="button" href="about.php">Learn More</a></div>
                </div>
                <div class="col-sm-4">
                    <div class="d-none d-md-block iphone-mockup" style="margin-top:-23px;margin-bottom:-5px;"><img src="assets/img/iphone.svg" class="device"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="about.html">Company</a></li>
                            <li><a href="about.html">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-linkedin-outline"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                </div>
                <p class="copyright">Tone &nbsp;Designs © 2018</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>