
<?php 
session_start();

include 'includes/connection.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

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
    <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>

<body style="color:#8f8f8f;">
     <?php 
     
        global $connect;
         $wrong = "";
        if (isset($_POST['admin_login'])){
            
            $email = mysqli_real_escape_string($connect, $_POST['email']);
            $pass = mysqli_real_escape_string($connect,$_POST['password']);
            
            $select = "select * from admin where admin_email= '$email' AND admin_pass = '$pass'";
            $run = mysqli_query($connect, $select);
            $num_rows = mysqli_num_rows($run);
           
            
            if ($num_rows == 0 ){
                $wrong = "Email or Password is incorrect";
            }
            else{
                $_SESSION['admin_email'] = $email;
                echo "<script> window.open('index.php','_self')</script>";
                
            }
        }
        
        
        
        ?>
    <div class="login-clean">
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><p style ="color:red; margin-left: 5px;"><?php echo $wrong;?> </p><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" name ="admin_login" type="submit">Log In</button></div><a href="#" class="forgot">Forgot your email or password?</a>
        </form>
        
       
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>