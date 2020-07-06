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
                                           <th style='width:28px;'>S/N</th>
                                            <th style='width:30px;'>ID</th>
                                            
                                            <th style='width:100px;'>ID</th>
                                            
                                            <th style='width:200px;'>Topic</th>
                                            <th style='width:48px;'></th>
                                            <th style='width:48px;'></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    include 'connection.php';
                                   global $connect;


                                   $select = "select * from topics";
                                    $run_s = mysqli_query($connect,$select);
                                    
                                    $i=0;
                                    
                                    while ($row = mysqli_fetch_array($run_s)) {
                                        
                                        
                                        $topic_id = $row['topic_id'];
                                        $topic_title = $row['topic_title'];
                                        $topic_img =  $row['topic_image'];
                                $i++;
                                                             
                                     echo "
                                    <tbody style ='font-size:13px;'>
                                        <tr>
                                            <td style='width:22px;'>$i</td>
                                                <td>$topic_id</td>
                                           
                                                <td><img class='rounded-circle img-fluid' src='../images/$topic_img' style='width:50px;height:50px;margin-top:-8px;margin-left:11px;'></td>
                                         <td>$topic_title</td>
                                            
                                               
                                                <td><a href='index.php?edittopic=$topic_id'>Edit</a></td>
                                            <td><a href='index.php?deletetop=$topic_id'>Delete</a></td>
                                        </tr>
                                    </tbody>";
                                    
                                    
                                    }                             
                                    ?>
                                    
                                </table>
                            </div>