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
    
    $select_msg = "select * from messages where receiver = $user_id AND status='unread'";
                           $run_select_msg = mysqli_query($connect,$select_msg);
                           $num_unread = mysqli_num_rows($run_select_msg);
                           ?>
    <nav class="navbar navbar-light navbar-expand-md bg-info navigation-clean-search">
        <div class="container"><a class="navbar-brand" href="#" data-bs-hover-animate="rubberBand" style="font-size:18px;">MixTone</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
           <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav" style="font-size:15px;">
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="all_topics.php" data-bs-hover-animate="pulse" style="font-size:13px;">Trending Topics</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="members.php" data-bs-hover-animate="pulse" style="font-size:13px;">Users</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="welcome_home.php" data-bs-hover-animate="pulse" style="font-size:13px;">Explore</a></li>
                </ul>
                <form class="form-inline ml-auto" action="search_users.php" method="get">
                    <div class="form-group" style="margin-right:24px;"><label for="search-field"><i class="fa fa-search" style="height:16px;width:16px;margin-top:-4px;margin-left:0px;margin-right:-3px; margin-bottom:5px;"></i></label><input class="form-control search-field" type="search" name="search_query" placeholder="Search Users"
                            maxlength="20" autocomplete="on" id="search-field" style="background-color:rgba(0,0,0,0.05);margin-right:0px;margin-left:10px;color:#ffffff;font-size:15px;">
                        <button class="btn btn-info action-button" value="search" name="search" type="submit" style="margin-right:-5px;padding-right:33px;margin-left:10px;margin-top:0px;">Search</button></div>
                </form>
              
                        <li class="dropdown d-inline" style="padding-right:0px;margin-left:16px;margin-right:-9px;"><a class="dropdown-toggle text-light dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false" href="#"> <?php echo $_SESSION['user_email']?> &nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="account.php?user_id=<?php echo $user_id;?>">Account</a><a class="dropdown-item" role="presentation" href="user_profile.php?user_id= <?php echo $user_id;?>">Profile</a><a class="dropdown-item" role="presentation" href="logout.php">Log Out</a></div>
                        </li>
               
        </div>
        </div>
    </nav>
    <div class="team-boxed">
        <div class="container">
            <div class="row people">
                <div class="col-md-5 col-lg-4 col-xl-3 item" style="height:573px;">
                       <?php    include 'sidebar.php';?>
               
                <div class="col-md-7 col-lg-8 col-xl-8 offset-xl-0 item">
                    <div class="row">
                                <div class="col">
                                    <h3 class="text-center" style="margin-top:21px;margin-bottom:0px;font-size:35px;"><em>Users to Follow</em></h3><br><br>
                           <?php 
                            
        $members = "select * from users limit 30";
        $run_members = mysqli_query($connect, $members);
        while ($row_memb = mysqli_fetch_array($run_members)){
        
        $member_name = $row_memb ['name'];
        $member_image =$row_memb['user_image'];
        $member_id = $row_memb['user_id'];
                           
                           
         echo "<div class<div class='row' style = 'padding:5px; background-color:#f7f9fc; margin-left:10px;'>
        <div class='col-1'><img class='rounded-circle float-left' title = '$member_name' src='assets/img/$member_image' style='height:40px;width:39px;'>
            </div>
        <div class='col-7'>
            <h5 class='text-left'style='padding:10px; text-transform:capitalize; margin-left:10px; margin-right:10px;'><a style='color:#5a6268;font-size:14px; text-decoration:none;' href = 'user_profile.php?user_id=$member_id'>$member_name</a></h5>
                </div>
               <div class ='col-3 col-lg-4'> <a class='btn btn-dark btn-xs' style='margin-top:5px; font-size:13px;float:right; ' role='button' href='message.php?user_id=$member_id'>Message&nbsp;<i class='fa fa-envelope' style='padding:0px;margin-right:0px;'></i></a>
        </div>
    </div> <br>";
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