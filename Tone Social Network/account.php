
<?php
include 'includes/connection.php';
//include 'user_insert.php';
//include 'user_login.php';
include 'home.php';
session_start();
if (!isset($_SESSION['user_email']))
{
    header("location: login.php");
}
else
{
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixtone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <?php    include 'navbar.php';?>
    <div class="team-boxed">
        <div class="container">
            <div class="row people">
                <div class="col-md-12 col-lg-4 col-xl-3 item" style="height:573px;">
                    <?php    include 'sidebar.php';?>
           
                <div class="col-md-7 col-lg-8 col-xl-8  item col-xs-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="table-responsive"   style="margin-left:2px;background-color:rgba(255,255,255,0.3);">
                                <table class="table table-hover table-sm" >
                                    <thead>
                                        <tr>
                                            <th style="color:#8f8f8f;"><em>Posts</em></th>
                                            <th style="color:#8f8f8f;"><em>Messages</em></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="background-color:rgba(255,255,255,0.8);color:#222222;">
                                            <td data-bs-hover-animate="swing"><strong><?php echo $row_number_of_posts ;?></strong></td>
                                            <td data-bs-hover-animate="swing"><strong> <?php echo $num_unread;?></strong></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form method="post">
                                <div class="form-group" style="padding-top:28px;">
                                    <h1 data-bs-hover-animate="bounce" style="margin-top:14px;color:#9da9ae;">Edit Details</h1>
                                    <input class="form-control" type="text"  name="name" value="<?php echo $name;?>" style="margin-top:20px;margin-bottom:10px;">
                                    <input class="form-control" type="email" name="email" value="<?php echo $user;?>" style="margin-bottom:10px;"> 
                                    <input class="form-control" type="text" name="occupation" placeholder="Occupation" required="required" style="margin-bottom:10px;">
                                    <!-- <input class="form-control" type="password" name="password "placeholder="Password" style="margin-bottom:10px;">
                                    <input class="form-control" type="password" placeholder="New Password" name="new_password" style="margin-bottom:10px;">-->
                                    
                                    <select class="form-control" name="country" required="required"style="margin-bottom:16px;">
                                        <option value=""> Select Country of Residence</option>
                                        <option> Nigeria </option>
                                        <option> Ghana</option>
                                         <option>United Kingdom</option>
                                          <option>South Africa</option>
                                           <option>Portugal</option>
                                            <option>United States</option>
                                             <option>Australia</option>
                                              <option>France</option>
                                               <option>Germany</option>
                                    </select>
                                
                                    <select class="form-control" name="gender" style="margin-bottom:16px;" required="required">
                                        <option  disabled="disabled" selected=""> Select Gender </option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <button class="btn btn-success btn-lg" type="submit" name="update" data-bs-hover-animate="jello" style="padding:7px;width:130px;padding-bottom:11px;margin-bottom:5px;">Save</button>
                            </form>
                            
                            <?php
                            //for changing profile details
                            if(isset($_POST['update'])){
                               
                                $u_name =$_POST['name'];
                                $u_email =$_POST['email'];
                                $u_occupation =$_POST['occupation'];
                                $country =$_POST['country'];
                                $gender = $_POST['gender'];
                               
                                
                                $update ="update users set name = '$u_name' , user_email = '$u_email', occupation = '$u_occupation', gender = '$gender',user_country ='$country' where user_id = $user_id";
                                $run = mysqli_query($connect, $update);
                                
                                if ($run){
                                    echo" <h3>Saved</h3>";
                                    echo "<script> window.open('account.php?user_id=$user_id','_self')</script>";
                                }
                                
                            }
                            
                            ?>                       
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                        <h1 data-bs-hover-animate="bounce" style="color:#9da9ae;">Edit Profile Picture</h1>
                        <form method="post" enctype="multipart/form-data" style="margin-top:-10px;">
                            <div class="form-inline">
                            <img class="img-responsive rounded-circle" src="assets/img/<?php echo $image; ?> " height="100" width="100">
                            <input class="form-control" type="file" name="u_image" placeholder="Profile Picture" required="required" style=" margin-left: 10px;">
                            <button class="btn btn-secondary" type="submit" name="picture"  style="width:100px; margin-left: 20px; margin-top:5px; ">Upload</button>
                            </div>
                        </form>
                         <?php
                         //for changing profile picture
                            if(isset($_POST['picture'])){
                               
                               
                                $u_image =$_FILES['u_image']['name'];
                                $tmp_image =$_FILES['u_image']['tmp_name'];
                               
                                move_uploaded_file($tmp_image, "assets/img/$u_image");
                                
                                $pic_update ="update users set user_image ='$u_image' where user_id = $user_id";
                                $pic_run = mysqli_query($connect, $pic_update);
                                
                                if ($pic_run){
                                    echo" <h3>Picture Updated</h3>";
                                    echo "<script> window.open('account.php?user_id=$user_id','_self')</script>";
                                }
                                
                            }
                            
                            ?>
                        </div>  </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <form method="post">
                                <div class="form-group" style="padding-top:28px;">
                                    <h1 data-bs-hover-animate="bounce" style="margin-top:14px;color:#9da9ae;">Change Password</h1>                                    
                                     <input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom:10px;">
                                    <input class="form-control" type="password" placeholder="New Password" name="new_password" style="margin-bottom:10px;">
                                                                        
                                </div>
                                <button class="btn btn-dark btn-lg" type="submit" name="pass" data-bs-hover-animate="jello" style="padding:7px;width:130px;padding-bottom:11px;margin-bottom:5px;">Save</button>
                            </form>
                            
                            <?php
                            //for changing password
                            if(isset($_POST['pass'])){
                               
                                $u_password =$_POST['password'];
                                $u_new_password =$_POST['new_password'];
                                
                                if ($password == $u_password){
                                $p_update = "update users set user_pass = '$u_new_password' where user_id = $user_id";
                                $p_run = mysqli_query($connect,$p_update);
                                }
                                else
                                {
                                    echo "<script>alert('Wrong Password')</script>";
                                }
                                  
                                if ($p_run){
                                    echo" <br> <h3>Password Updated</h3>";
                                    //echo "<script> window.open('account.php?user_id=$user_id','_self')</script>";
                                }
                                
                            }
                            
                            ?>                       
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="col" style="margin-top:27px;">
                            <form method="post">
                                <h1 style="margin-top:27px;margin-bottom:19px;color:#9da9ae;">Delete Account</h1>
                                <div class="alert alert-danger" role="alert" style="margin-bottom:19px;"><span><strong>Once your Account is deleted, It cannot be Recovered!!</strong><br></span></div>
                                <button class="btn btn-danger btn-lg" type="submit" name="delete" data-bs-hover-animate="jello" style="width:192px;height:58px;margin-bottom:9px;padding-bottom:11px;margin-top:11px;">Delete Account</button>
                            </form>
                            
                          <!-- modal for deleting account <div class="modal fade" role="dialog" tabindex="-1">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Account</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <p>Your Account will be Deleted</p>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
                                    </div>
                                </div>
                            </div>-->
                          <?php 
                          if (isset($_POST['delete'])){
                             echo "<script> alert('Contact Administrator to delete Account')</script>"; 
                          }
                          ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>
<?php } ?>