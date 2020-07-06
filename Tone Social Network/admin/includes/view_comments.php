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
                                            <th style='width:70px;'>ID</th>
                                           
                                            <th style='width:180px;'>Author</th>
                                            <th style='width:253px;'>Comment</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    include 'connection.php';
                                   global $connect;


                                   $select = "select * from comments";
                                    $run_s = mysqli_query($connect,$select);
                                    
                                    $i=0;
                                    
                                    while ($row = mysqli_fetch_array($run_s)) {
                                        
                                        
                                        $c_id = $row['comment_id'];
                                        $user_id = $row['user_id'];
                                        $post_id =  $row['post_id'];
                                        $content =$row['comment'];
                                        
                                        $select_name = "select * from users where user_id = $user_id";
                                        $run_name = mysqli_query($connect, $select_name);
                                        $rowname = mysqli_fetch_array($run_name);
                                        
                                        $author = $rowname['name'];
                                        $author_img = $rowname['user_image'];
                                        
                                        
                                        $i++;
                                                             
                                     echo "
                                    <tbody style ='font-size:13px;'>
                                        <tr>
                                            <td style='width:22px;'>$i</td>
                                           
                                                <td><img class='rounded-circle img-fluid' src='../assets/img/$author_img' style='width:50px;height:50px;margin-top:-8px;margin-left:11px;'></td>
                                         
                                            <td>$author</td>
                                                 <td style='width:155px;'>$content</td>
                                                
                                            <td><a href='index.php?deletecom=$c_id'>Delete</a></td>
                                        </tr>
                                    </tbody>";
                                    
                                    
                                    }                             
                                    ?>
                                    
                                </table>
                            </div>