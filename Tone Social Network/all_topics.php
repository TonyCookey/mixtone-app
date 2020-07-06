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
     <?php    include 'navbar.php';?>
    <div class="team-boxed">
        <div class="container">
            <div class="row people">
                <div class="col-md-5 col-lg-4 col-xl-3 item" style="height:573px;">
                    <?php    include 'sidebar.php';?>
                <div class="col-md-7 col-lg-8 col-xl-8 offset-xl-0 item">
                    <div class="row">
                                <div class="col-md-">
                                    <h3 class="text-center" style="margin-top:21px;margin-bottom:-13px;font-size:25px;"><strong><em>#</em></strong><em>Trending Topics</em></h3><br><br>
                           <?php 
                            
        $topics = "select * from topics";
        $run_topics = mysqli_query($connect, $topics);
        while ($row_top = mysqli_fetch_array($run_topics)){
        
        $topic_name = $row_top ['topic_title'];
        $topic_image =$row_top['topic_image'];
        $topic_id = $row_top['topic_id'];
                           
                           
         echo "<div class='row justify-content-center' style='margin-left:10px; background-color:#f7f9fc;'>
        <div class='col-2 '><img class='rounded-circle' src='assets/img/3.jpg' style='height:60px;margin-left:5px; margin-right:30px; width:60px;'></div>
        <div class='col-5 '>
            <h4 class='text-left' style='margin-top:25px;margin-left:10px; font-size:14px; margin-right:10px'>$topic_name</h4>
        </div>
        <div class='col-5'><a class='btn btn-info btn-sm' role='button' href='topic.php?topic=$topic_id' style='margin-top:15px;padding-top:5px;padding-right:10px;padding-left:13px;width:90px; height:34px;'>Explore<i class='fa fa-plus' style='margin-left:8px;'></i>&nbsp;</a></div>
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