<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'includes/connection.php';
$wrong ="";
if(isset($_POST['login'])){
        $log_email = $_POST['email'];
        $log_password =mysqli_real_escape_string($connect, $_POST['password']);
        
        $get_user = "select * from users where user_email = '$log_email' AND user_pass = '$log_password'";
        $run_get_user = mysqli_query($connect, $get_user);
        $check = mysqli_num_rows($run_get_user);
        
        if($check == 1)
        {
            $_SESSION['user_email'] = $log_email;
            echo "<script> window.open('welcome_home.php','_self')</script>";
        }
        else
        {
           $wrong = "Username or Password is invalid ";
        }
        
        
}
