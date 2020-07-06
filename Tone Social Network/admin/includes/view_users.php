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
                                            <th style='width:70px;'></th>
                                            <th style='width:253px;'>User Name</th>
                                            <th style='width:185px;'>Email</th>
                                            <th style='width:47px;'>Gender</th>
                                            <th style='width:45px;'>Country</th>
                                            <th style='width:50px;'></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                   include 'connection.php';
                                   global $connect;


                                   $select = "select * from users order by 1 DESC";
                                    $run_s = mysqli_query($connect,$select);
                                    
                                    $i=0;
                                    
                                    while ($row = mysqli_fetch_array($run_s)) {
                                        
                                        
                                        
                                        $user_id = $row['user_id'];
                                        $image =  $row['user_image'];
                                        $name =$row['name'];
                                        $email =$row['user_email'];
                                        $gender =$row['gender'];
                                        $country = $row['user_country'];
                                        $i++;
                                                             
                                    echo "
                                    <tbody style ='font-size:13px;'>
                                        <tr>
                                            <td style='width:22px;'>$i</td>
                                            <td><img class='rounded-circle img-fluid' src='../assets/img/$image' style='width:50px;height:50px;margin-top:-8px;margin-left:11px;'></td>
                                            <td style='width:61px;' class = 'text-left'> $name</td>
                                            <td>$email</td>
                                            <td style='width:57px;'>$gender</td>
                                            <td style='width:84px;'>$country</td>
                                            <td style='width:79px;'><a href='index.php?deleteuser=$user_id'>Delete</a></td>
                                        </tr>
                                    </tbody>";
                                    
                                    }                             
                                    ?>
                                    
                                </table>
                            </div>