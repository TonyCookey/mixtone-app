<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            $single_post_id = $_GET['post_id'];
            
            $get_comm ="select * from comments where post_id = '$single_post_id' ORDER by 1 DESC ";
            $run_comm = mysqli_query($connect, $get_comm);
            $num_rows = mysqli_num_rows($run_comm);
            
            
            
            echo "<br><br><h1>Comments </h1><br>";
            
           while($rows = mysqli_fetch_array($run_comm)){
           $com =$rows['comment'];
           
           $user_id =$rows['user_id'];
           
           $date = $rows['date'];
           
           $comm_user ="select * from users where user_id = '$user_id'";
            $run_user = mysqli_query($connect, $comm_user); 
            
            $rows_user = mysqli_fetch_array($run_user);
            
            $user_name = $rows_user['name'];
            $user_image = $rows_user['user_image'];
            
           
       echo    " <div class = 'row' style='margin-top:6px; '>

                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px; margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $date</p>
                        </div>
                        <div class='col-lg-10'>
                            <div style=' background-color:#eeeeee; padding-top:10px;'>
                            
                             <p class = 'text-left' style ='font-size:14px; margin-left:20px; padding-bottom:20px; margin-bottom:10px;' > $com </p>
                            </div>    
                           
                     
                        </div>
                    </div><br> ";
           }
            if ($num_rows == 0){
               echo "<p style='font-size:16px; color:grey;'> No Comments on this Post </p>";;
            }
           

          