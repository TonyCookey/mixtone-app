<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<form method="post" action="" enctype="multipart/form-data">
                        <div class='form-group'>
                            <input class="form-control" type="file" name="u_images">
                            <input class='form-control' type='text' name='topic' placeholder='New Topic' style='margin-top:20px;'></div>
<button class='btn btn-info btn-lg' type='submit' name="add" style='margin-bottom:13px;'>Add Topic</button>
</form>
                    <?php
                                  include 'connection.php';
                                   global $connect;
                                   
                    if(isset($_POST['add'])){
                               
                               $topic = $_POST['topic'];
                                $u_image = $_FILES['u_images']['name'];
                                $tmp_image = $_FILES['u_images']['tmp_name'];
                               
                                move_uploaded_file($tmp_image, "../images/$u_image");
                                
                                $pic_update ="insert into topics (topic_title,topic_image) VALUES('$topic','$u_image')";
                                $pic_run = mysqli_query($connect, $pic_update);
                                
                                if ($pic_run){
                                    echo" <h3>New Topic Inserted</h3>";
                                    
                                }
                                
                            }
                            ?>