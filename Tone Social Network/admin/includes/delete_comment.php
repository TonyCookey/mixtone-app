<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connection.php';
global $connect;
                                $com_del = $_GET['deletecom'];
                               
                               $delete_com = "delete from comments where comment_id = $com_del";
                               $run_del_com = mysqli_query($connect, $delete_com);
                               
                               if ($run_del_com){
                                    echo "<script> alert(' Comment Deleted')</script>";
                               }
                               