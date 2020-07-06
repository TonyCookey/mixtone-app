<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="trials.php" enctype="multipart/form-data" >
            <input type="file" name = "u_image">
            <input type="submit" name="submit">
        </form>
        <?php
        
        if (isset($_POST['submit'])){
            
            $image =$_FILES['u_image']['name'];
            $image_tmp =$_FILES['u_image']['tmp_name'];       
             
             //echo $image;
             echo $image_tmp;
             
        }
        ?>
    </body>
</html>
