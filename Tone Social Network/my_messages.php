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
                            
                            
                              <h4 style='margin-top:14px;color:#9da9ae;'>My Messages</h4>
                           <a href ='my_messages.php?inbox'>Inbox</a> || 
                         <a href='my_messages.php?sent'>Sent</a><br>
                        
                    
                             <?php
                           if (isset($_GET['inbox']))
                           {
                            echo"<div class='table-responsive'>
                                <table class='table'>
                                <thead>
                                    <tr>
                                    <th style='width:261px;'>Sender</th>
                                    <th style='width:410px;'>Title</th>
                                    <th style='width:155px;'></th>
                                    <th style='width:199px;'>Date</th>
                                </tr>
                                </thead>
                          ";
                           $selectmsg = "select * from messages where receiver = $user_id ORDER by 1 DESC";
                           $run_select = mysqli_query($connect,$selectmsg);
                           
                                                   
                           
                           while ($row1 = mysqli_fetch_array($run_select)) {
                               
                               $msg_id = $row1['msg_id'];
                               $msg_sender = $row1['sender'];
                               $msg_date = $row1['date'];
                               $msg_title = $row1['title'];
                               $msg_content = $row1['content'];
                               $msg_status = $row1['status'];
                               
                               $get_sender = "select * from users where user_id = '$msg_sender'";
                               $run_sender = mysqli_query($connect, $get_sender);
                               $row2 = mysqli_fetch_array($run_sender);
                               $sender_name = $row2['name'];
                               
                               if($msg_status=='read'){
                                   $color ='bg-light';
                               }
                               else{
                                   $color = 'bg-white';
                               }
                               
                              echo " <tbody >
                                        <tr style='font-size:13px;' class='$color'>
                            <td><h6><a style='text-transform:capitalize; text-decoration:none; font-size:13px;' href='user_profile.php?user_id=$msg_sender' target='blank'>$sender_name</a></h6></td>
                            <td style='text-transform:capitalize; font-size:12px;'>$msg_title</td>
                            <td style='font-size:12px;'><a href='single_message.php?msg_id=$msg_id'>View</a></td>
                            <td style='font-size:12px;'>$msg_date</td>
                        </tr>
                    </tbody>";
                           }
                           }
                           
                           if (isset($_GET['sent'])){
                               include 'sent.php';
                           }
                ?>
                              
                                <br>
                           
                       </table>
            </div>
                    
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