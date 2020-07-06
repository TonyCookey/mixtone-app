<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'includes/connection.php';
session_start();

if (isset($_GET['code'])){
    
    $ver_code = $_GET['code'];
    
    $select = "select * from users where ver_code = '$ver_code'";
    $run_s = mysqli_query($connect, $select);
    $num_rows = mysqli_num_rows($run_s);
    
    $row = mysqli_fetch_array($run_s);
    
    $email = $row['user_email'];
    
    if ($num_rows == 1){
          $_SESSION['user_email'] = $email;
          
          $update ="update users set status = 'verified' where ver_code = '$ver_code'";
          $run_update = mysqli_query($connect, $update);
          echo "<script> window.open('welcome_home.php','_self')</script>";
    }
    else
        {
        echo "<script> window.open('unconfirm.html','_self')</script>";
    }
    
    
    
}