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

<body style="font-size:13px;">
    <nav class="navbar navbar-light navbar-expand-md bg-info navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#" data-bs-hover-animate="rubberBand" style="font-size:18px;">MixTone</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
           <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav" style="font-size:15px;">
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="all_topics.php" data-bs-hover-animate="pulse" style="font-size:13px;">Trending Topics</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="members.php" data-bs-hover-animate="pulse" style="font-size:13px;">Users</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="welcome_home.php" data-bs-hover-animate="pulse" style="font-size:13px;">Explore</a></li>
                </ul>
                <form class="form-inline ml-auto" action="results.php" method="get">
                    <div class="form-group" style="margin-right:24px;"><label for="search-field"><i class="fa fa-search" style="height:16px;width:16px;margin-top:-4px;margin-left:0px;margin-right:-3px;"></i></label><input class="form-control form-control-lg search-field" type="search" name="search_query" placeholder="Search Topics"
                            maxlength="20" autocomplete="on" id="search-field" style="background-color:rgba(0,0,0,0.05);margin-right:17px;margin-left:10px;color:#ffffff;font-size:16px;">
                        <button class="btn btn-info action-button" value="search" name="search" type="submit" style="margin-right:-5px;padding-right:33px;margin-left:-10px;margin-top:8px;">Search</button></div>
                </form>
                        <li class="dropdown d-inline" style="padding-right:0px;margin-left:16px;margin-right:-9px;"><a class="dropdown-toggle text-light dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false" href="#"> <?php echo $_SESSION['user_email']?> &nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="account.php">Account</a><a class="dropdown-item" role="presentation" href="#">Settings</a><a class="dropdown-item" role="presentation" href="logout.php">Log Out</a></div>
                        </li>
               
        </div>
        </div>
    </nav>
    <div class="team-boxed">
        <div class="container">
            <div class="row people">
                <div class="col-md-5 col-lg-4 col-xl-3 item" style="height:573px;">
                    <div class="box" style="height:485px;">
                        
                   <?php
                        global $connect;
                        $user = $_SESSION['user_email'];
                        $get_user = "select * from users where user_email = '$user'";
                        $run_user = mysqli_query($connect, $get_user);
                        $row = mysqli_fetch_array($run_user);
                        //to get number of posts of a particular user
                        
                        
                       $name = $row['name'];
                       $user_id = $row['user_id'];
                       $image = $row['user_image'];
                       $occupation = $row['occupation'];
                       
                        $query_number_of_posts = "select * from posts where user_id = '$user_id'";
                        $run_query_number_of_posts = mysqli_query($connect, $query_number_of_posts);
                        $row_number_of_posts = mysqli_num_rows( $run_query_number_of_posts);
                       
                        echo "<img class='rounded-circle' src='assets/img/$image' style='height:134px;'>";
                        echo "<h3 class='name' style='font-size:24px;'>$name </h3>";
                        ?>
                        <p class="title" style="font-size:17px;margin-bottom:9px;"><?php echo $occupation;?></p><a class="d-block" href="user_posts.php?user_id=<?php echo $user_id;?>" data-aos="fade" style="font-size:13px;padding:5px;">Posts ( <?php echo $row_number_of_posts ?> )</a>  <a class="d-block" href="my_messages.php" style="font-size:13px;padding:5px;">Messages</a> <!--<a class="d-block" href="#" style="font-size:13px;padding:5px;">Following (13)</a>
                         <a
                            class="d-block" href="#" style="font-size:13px;padding:5px;">Followers (563)</a>--> <a class="d-block" href="account.php" style="padding:5px;font-size:13px;">Account</a><a class="d-block" href="logout.php" style="padding:5px;font-size:13px;">Log Out</a></div>
                </div>
                <div class="col-md-7 col-lg-8 col-xl-8 offset-xl-0 item">
                    <div class="row">
                                <div class="col">
                                    
                          <?php 
                          if (isset($_GET['user_id']))
                              {
                           $u_id =   $_GET['user_id'];
                           $select = "select * from users where user_id = '$u_id'";
                           $run_m = mysqli_query($connect, $select);
                           $row_m = mysqli_fetch_array($run_m);
                           //reciever details
                                   $reciever_name = $row_m['name'];
                                   $receiver_image = $row_m['user_image'];
                                   $reciver_date = $row_m['last_login'];
                              
                          }
                          ?>
                                    <form  action="message.php?user_id=<?php echo $u_id ;?>" method="post">
                                    <div class="form-group" style="padding-top:28px;">
                                    <h1 data-bs-hover-animate="bounce" style="margin-top:14px; font-size: 28px; text-transform:capitalize;">Send Message to <?php echo $reciever_name;?> </h1>
                                    <br><img class="img-responsive rounded-circle" src="assets/img/<?php echo $receiver_image?>" height="100" width="100" >
                                    <h6 style="color:#9da9ae; font-size: 12px; margin-top: 5px; font-style: italic;">last seen: <?php echo $reciver_date;?></h6>
                                    <input class="form-control" type="text"  name="message_title" placeholder="Title" required="required" style="margin-top:20px;margin-bottom:10px;font-size:15px;">
                                    <textarea class="form-control" rows="3" name="message_content" required="required" spellcheck="true" placeholder="Type your Message" style="margin-top:10px;font-size:15px;"></textarea>
                                    
                                </div>
                                        <button class='btn btn-dark btn-sm' style='margin-top:5px; float: right;' type='submit' name="message"> Send Message&nbsp;<i class='fa fa-send-o' style='padding:3px;margin-right:4px;'></i></button>
                                    </form>
                                    
                                    <?php
                                    if(isset($_POST['message']))
                                    {
                                        $msg_title = $_POST['message_title'];
                                        $msg_content = addslashes($_POST['message_content']);
                                        
                                        $insert ="insert into messages (sender,receiver,title,content,reply,status,date) VALUES($user_id,$u_id,'$msg_title','$msg_content','no reply','unread',NOW())";
                                        $run_insert = mysqli_query($connect,$insert);
                                      
                                      if ($run_insert){
                                         
                                          echo "<h5> Message Sent </h5>";
                                      }
                                      
                                      
                                      
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