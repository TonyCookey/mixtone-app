<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 
<form method="post" action="" enctype="multipart/form-data">
                        <div class='form-group'>
                            <input class="form-control" type="file" name="u_images" >
                            <input class='form-control' type='text' name='topic' placeholder='Topic' style='margin-top:20px;'></div>
<button class='btn btn-info btn-lg' type='submit' name="added" style='margin-bottom:13px;'>Add Topic</button>
</form>
                   <?php
                                  include 'connection.php';
                                   global $connect;
                         $top = $_GET['edittopic']  ;
                         
                    if(isset($_POST['added'])){
                        
                        
                               
                               $topic = $_POST['topic'];
                                $u_image = $_FILES['u_images']['name'];
                                $tmp_image = $_FILES['u_images']['tmp_name'];
                               
                                move_uploaded_file($tmp_image, "../images/$u_image");
                                
                                $pic_update2 ="update topics set topic_title = '$topic', topic_image = '$u_image' where topic_id = $top ";
                                $pic_run2 = mysqli_query($connect, $pic_update2);
                                
                                if ($pic_run2){
                                    echo" <h3> Topic Updated</h3>";
                                    
                                }
                                
                            }
                            ?>