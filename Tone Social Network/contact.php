<!DOCTYPE html>
<?php include 'includes/connection.php'; ?>
<html>

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
        <div class="container"><a class="navbar-brand" href="#">M<em>i</em>xT<em>o</em>n<em>e</em></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about.html">About Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact.php">Contact Us</a></li>
                </ul><span class="navbar-text actions"> <a href="login.php" class="login">Log In</a><a class="btn btn-light action-button" role="button" href="index.php">Sign Up</a></span></div>
        </div>
    </nav>
    <div class="contact-clean">
        <form method="post" >
            <h2 class="text-center">Contact us</h2>
            <div class="form-group"><input class="form-control" type="text" name="name" required="" placeholder="Name"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Email"></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="message" required="" placeholder="Message"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" name="contact">submit</button></div>
            
     <?php 
     global $connect;
             
     if(isset($_POST['contact']))
         {
    
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $message = $_POST['message'];
    
    $insert = "insert into complain (name,email,message,date) values('$name','$email','$message',NOW())";
    $insert_comp = mysqli_query($connect, $insert);
    
    if($insert_comp){
        echo "<h6>Your message  has been received , We'll get back to you. </h6>";
       }
     }
        ?>    
        </form>
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
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
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