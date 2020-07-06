<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connection.php';
global $connect;
                                $post_del = $_GET['deletepost'];
                               
                               $delete_post = "delete from posts where post_id = $post_del";
                               $run_del_post = mysqli_query($connect, $delete_post);
                               
                               if ($run_del_post){
                                    echo "<script> alert(' Post Deleted')</script>";
                               }
                               