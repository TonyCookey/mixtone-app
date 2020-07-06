<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="box" style="height:485px;">
                        
                   <?php
                       
                        echo "<img class='rounded-circle' src='assets/img/$image' style='height:134px;'>";
                        echo "<h3 class='name' style='font-size:24px;'>$name </h3>";
                        
                       echo " <p class='title' style='font-size:17px;margin-bottom:9px;'>$occupation</p><a class='d-block' href='user_posts.php?user_id=$user_id' data-aos='fade' style='font-size:13px;padding:5px;'>Posts ( $row_number_of_posts )</a>  <a class='d-block' href='my_messages.php?inbox' style='font-size:13px;padding:5px;'>Messages ( $num_unread )</a>
                         <a class='d-block' href='user_profile.php?user_id=$user_id' style='font-size:13px;padding:5px;'>My Profile </a> <a class='d-block' href='account.php?user_id=$user_id' style='padding:5px;font-size:13px;'>Account</a><a class='d-block' href='logout.php' style='padding:5px;font-size:13px;'>Log Out</a></div>"
                ?>
                </div>

