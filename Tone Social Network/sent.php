<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class='table-responsive'>
                                <table class='table'>
                                <thead>
                                    <tr>
                                    <th style='width:261px;'>Receiver</th>
                                    <th style='width:410px;'>Title</th>
                                    <th style='width:165px;'></th>
                                    <th style='width:189px;'>Date</th>
                                </tr>
                                </thead>

                           <?php
                           $select = "select * from messages where sender = $user_id ORDER by 1 DESC";
                           $run_select = mysqli_query($connect,$select);
                           
                          
                           
                           
                           while ($row1 = mysqli_fetch_array($run_select)) {
                               
                               $msg_id = $row1['msg_id'];
                               $msg_receiver = $row1['receiver'];
                               $msg_date = $row1['date'];
                               $msg_title = $row1['title'];
                               $msg_content = $row1['content'];
                               $msg_status = $row1['status'];
                               
                               $get_receiver = "select * from users where user_id = '$msg_receiver'";
                               $run_receiver = mysqli_query($connect, $get_receiver);
                               $row2 = mysqli_fetch_array($run_receiver);
                               $receiver_name = $row2['name'];
                               
                               
                              echo " <tbody>
                                        <tr>
                            <td><h6><a style='text-transform:capitalize; text-decoration:none;' href='user_profile.php?user_id=$msg_receiver' target='blank'>$receiver_name</a></h6></td>
                            <td style='text-transform:capitalize;'>$msg_title</td>
                            <td><a href='single_message.php?msg_id=$msg_id'>View Reply</a></td>
                            <td>$msg_date</td>
                        </tr>
                    </tbody>";
                           }
                ?>
                              
                                <br>
                           
                       </table>
            </div>

