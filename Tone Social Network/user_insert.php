<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'includes/connection.php';

$pass_wrong= "";
$pass_match ="";
$used_email = "";

if(isset($_POST['signup'])){
    global $connect;
    $email = mysqli_real_escape_string($connect,$_POST['email']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $name = mysqli_real_escape_string($connect,$_POST['name']);
    $password_repeat =mysqli_real_escape_string($connect, $_POST['password-repeat']);
    $check = mysqli_real_escape_string($connect,$_POST['check']);
    $date = date("d-m-y");
    $status = "unverified";
    $posts ="no";
    $verification_code = mt_rand();
          
        $get_email = "select * from users where user_email = '$email' ";
        $run_email =  mysqli_query($connect, $get_email);
        
        $check = mysqli_num_rows($run_email);   
        
        if ($check == 1){
            $used_email = "Email is already registered";
        }
                      
           if (strlen($password) < 8){
            $pass_wrong = "Password should be more than 8 characters";
       
                      }
           if ($password !== $password_repeat){
                $pass_match = " Passwords do not match ";
               
           }
         
        
        else
            { 
            if ($password == $password_repeat){
             $insert = "insert into users (name,user_pass,user_email,user_image,agreement,register_date,ver_code) VALUES('$name','$password','$email','default_2.jpg','$check',NOW(),'$verification_code')";
            $run_insert = mysqli_query($connect, $insert);
            
            
           if ($run_insert){           
                echo "<script> window.open('confirm.html','_self')</script>";
                
                
                }
                else {
                     echo "<script> alert('Something Went wrong ')</script>";
                }
            
              // Always set content-type when sending HTML email
                
                $to = $email;
                $subject = "Verify your Email Address";
                $message = "<html>
<head>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Mixtone</title>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css'>
    
</head>
</head>
<body>

<div class ='container'>
<div class = 'row'>
<h3 class='text-muted'> Mixtone </h3>
</div>
<div class='row'>
<p>Hi,</p>
<p>Thank you for creating a Mixtone Account!,To start enjoying mixtone , you first need to confirm your email address <br></p>
<br>
<div class='row'>
<div class='col-12'>
<a class='btn btn-success' role = 'button' href='http://mixtone.atwebpages.com/verify.php?code=$verification_code'>Confirm your Email Address</a>
</div>
<p>Regards </p>
<p>Tony Cookey</p>
</div>
</div>
</div>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js'></script>
    <script src='assets/js/script.min.js'></script>
</body>
</html>";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <support@mixtone.com>' . "\r\n";
                

                mail($to,$subject,$message,$headers); 
            }
     
            
}
}

            
                
           
