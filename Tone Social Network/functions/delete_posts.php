<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../includes/connection.php';
if (isset($_GET['post_id'])){

            

    $post_id = $_GET['post_id'];
    $user_id = $_GET['user_id'];
            
            $delete = "delete from posts where post_id = '$post_id'";
            $run_comm = mysqli_query($connect,$delete);
           
            if ($run_comm)
            {
                
                echo "<script> window.open('../user_posts.php?user_id=$user_id','_self')</script>";
                 
            }
}      
            
           
           

          