<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connection.php';
global $connect;
                                $top_del = $_GET['deletetop'];
                               
                               $delete_top = "delete from topics where topic_id = $top_del";
                               $run_del_top = mysqli_query($connect, $delete_top);
                               
                               if ($run_del_top){
                                    echo "<script> alert(' Topic Deleted')</script>";
                               }
                               