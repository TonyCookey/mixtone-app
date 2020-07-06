<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$user_s = $_SESSION['user_email'];
                        $get_s_user = "select * from users where user_email = '$user_s'";
                        $run_s_user = mysqli_query($connect, $get_s_user);
                        $row = mysqli_fetch_array($run_s_user);
                        //to get session user                                         
                       
                       $us_id = $row['user_id'];           
    
     $like_status = 'Like';
    
     
     
        
        //increasing the number of likes
        if(isset($_GET['post_id'])){
            
            $pst_id = $_GET['post_id'];
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $pagenum = '&page='.$page;
            
        }
            
        
         $select_like = "select * from likes where user_id = '$us_id' AND post_id ='$pst_id'";
           $run_like = mysqli_query($connect, $select_like);
           $num_of_like = mysqli_num_rows($run_like);
           
           if($num_of_like < 1){
               
               $insert_like = "insert into likes (user_id,post_id) VALUES($us_id, $pst_id)";
                $run_insert_like = mysqli_query($connect, $insert_like);
           }
           else
           {
               $like_status ='Liked';
           }
        }   