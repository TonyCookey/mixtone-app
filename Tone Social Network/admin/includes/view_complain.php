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
                                            <th style='width:100px;'>Name</th>
                                            
                                            <th style='width:100px;'>Email</th>
                                            
                                            <th style='width:200px;'>Message</th>
                                            <th style='width:48px;'></th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                    include 'connection.php';
                                   global $connect;


                                   $select_c = "select * from complain";
                                    $run_c = mysqli_query($connect,$select_c);
                                    
                                    $i=0;
                                    
                                    while ($row = mysqli_fetch_array($run_c)) {
                                        
                                         $id = $row['c_id'];
                                        $name = $row['name'];
                                        $email = $row['email'];
                                        $message =  $row['message'];
                                        $attend = $row['attended'];
                                        
                                $i++;
                                        
                                if ($attend == 'yes')
                                {
                                    $col = 'white';
                                }
                                else 
                                {
                                    $col = 'inherit';
                                }
                                     echo
                                "
                                    <tbody style ='font-size:13px;'>
                                        <tr style ='background:$col;'>
                                            <td style='width:22px;'>$i</td>
                                                <td>$name</td>
                                              <td>$email</td>
                                                
                                         <td>$message</td>
                                         <td><a href='index.php?attend=$id'>Attended to</a></td>
                                            
                                        </tr>
                                    </tbody>";
                                    
                                   
                                    }                             
                                    ?>
                                    
                                </table>
                            </div>