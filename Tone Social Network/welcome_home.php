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
                        <div class="col">
                            <form method="post" action="welcome_home.php?id=<?php echo $user_id;?>">
                                <div class="form-group">
                                    <h3 class="text-muted" style="padding-bottom:9px;"><strong><em>New Post</em></strong></h3>
                                    <select class="form-control" required="required" name="topics" style="margin-top:21px;font-size:16px;height:37px;">
                                        <optgroup label="Topics">
                                            <option value="0" selected="">Select a Topic</option>
                                            <?php getTopics();?>
                                        </optgroup>
                                    </select>
                                    <input class="form-control" type="text" name="post-title" required="required" placeholder="Title" style="height:37px;margin-top:22px;font-size:18px;">
                                    <textarea class="form-control " rows="3" name="post-content" required="required" spellcheck="true" placeholder="Post Content" style="margin-top:22px;font-size:18px;height:85px;"></textarea>
                                     <button class="btn btn-success btn-lg float-right" type="submit" name = "post_btn" style="margin-top:18px;width:191px;padding-bottom:11px;padding-top:3px;margin-right:10px;padding-left:14px;height:41px;">Post to Timeline</button>
                                
                                </div>
                            
                            </form>
                            
                             <?php insertPost();?>
                           
                        </div>
                    </div><br>
                    <h3 class="text-center text-muted" style="margin-top:31px;margin-bottom:5px;font-size:25px;"><strong><em>#</em><em>Trending Discussions</em></strong></h3>
                  
                        <?php getPosts();?>
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