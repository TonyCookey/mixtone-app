<?php 
session_start();

include 'includes/connection.php';

if(!isset($_SESSION['admin_email'])){
    header("location:admin/admin_login.php");
}
else
{
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Mixtone</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css'>
    <link rel='stylesheet' href='../assets/css/styles.min.css'>
</head>

<body>
    <nav class='navbar navbar-light navbar-expand-md'>
        <div class='container-fluid'><a class='navbar-brand' href='index.php'>Admin Panel&nbsp;</a><button class='navbar-toggler' data-toggle='collapse' data-target='#navcol-1'><span class='sr-only'>Toggle navigation</span><span class='navbar-toggler-icon'></span></button>
            <div class='collapse navbar-collapse'
                id='navcol-1'>
                <ul class='nav navbar-nav'>
                    <li class='nav-item' role='presentation'><a class='nav-link active' href='index.php?users'>Users</a></li>
                    <li class='nav-item' role='presentation'><a class='nav-link' href='index.php?posts'>Posts</a></li>
                    <li class='nav-item' role='presentation'><a class='nav-link' href='index.php?comments'>Comments</a></li>
                    <li class='nav-item' role='presentation'><a class='nav-link' href='index.php?topics'>Topics</a></li>
                     <li class='nav-item' role='presentation'><a class='nav-link' href='index.php?complain'>Complains</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class='team-boxed'>
        <div class='container'>
            <div class='row people'>
                <div class='col-md-5 col-lg-3 col-xl-3 item' style='height:573px;'>
                    <div class='box' style='height:485px;font-size:16px;'><img class='rounded-circle' src='../assets/img/1.jpg' style='height:134px;'>
                        <h3 class='name' style='font-size:28px;'>Admin</h3><a class='d-block' href='index.php?users' data-aos='fade' style='font-size:14px;padding:5px;'>View Users</a> <a class='d-block' href='index.php?complain' data-aos='fade' style='font-size:14px;padding:5px;'>View Complains</a><a class='d-block' href='index.php?comments' style='font-size:14px;padding:5px;'>View Comments</a><a class='d-block'
                                                                                                                                                                                                        href='index.php?posts' style='padding:5px;font-size:14px;'>View Posts</a> <a class='d-block' href='index.php?topics' style='font-size:14px;padding:5px;'>View Topics</a><a class='d-block' href='index.php?newtopic' style='font-size:14px;padding:5px;'>New Topic</a>
                        <a
                            class='d-block' href='admin_logout.php' style='padding:5px;font-size:14px;'>Log Out</a>
                    </div>
                </div>
                <div class='col-md-7 col-lg-9 col-xl-8 offset-0 offset-xl-0 item'>
                    <div class='row'>
                        
                        <div class="col">
                           <?php 
                           
                           if (isset($_GET['users'])){
                               
                               include 'includes/view_users.php';
                           } 
                           if (isset($_GET['posts'])){
                               
                               include 'includes/view_posts.php';
                           }  
                           if (isset($_GET['comments'])){
                               
                               include 'includes/view_comments.php';
                           }    
                           if (isset($_GET['topics'])){
                               
                               include 'includes/view_topics.php';
                           }                       
                           if (isset($_GET['newtopic'])){
                               
                               include 'includes/new_topic.php';
                           } 
                           
                           if (isset($_GET['deleteuser'])){
                               include 'includes/delete_user.php';
                               
                           } 
                           if (isset($_GET['deletepost'])){
                               include 'includes/delete_post.php';
                               
                           } 
                           if (isset($_GET['deletecom'])){
                               include 'includes/delete_comment.php';
                               
                           } 
                           if (isset($_GET['deletetop'])){
                               include 'includes/delete_topic.php';
                               
                           } 
                            if (isset($_GET['complain'])){
                               include 'includes/view_complain.php';
                               
                           } 
                            if (isset($_GET['attend'])){
                                        $c_id = $_GET['attend'];
                                        $set = "update complain set attended = 'yes' where c_id= $c_id ";
                                        $run_set =  mysqli_query($connect, $set);
                                    }
                                    
                            if (isset($_GET['edittopic'])){
                                    
                                include 'includes/edit_topic.php';
                                   
                                }
                           ?>
                        </div>
                              </div>
        </div>
    </div>
            </div></div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js'></script>
    <script src='../assets/js/script.min.js'></script>
</body>

</html>
</html>
<?php } ?>