<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connection.php';
global $connect;
                                $user_del = $_GET['deleteuser'];
                               
                               $delete_user = "delete from users where user_id = $user_del";
                               $run_del_user = mysqli_query($connect, $delete_user);
                               
                               if ($run_del_user){
                                    echo "<script> alert(' User Deleted')</script>";
                               }
                               