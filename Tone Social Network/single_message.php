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
                                    
                           <h4>Conversation</h4>
                             <?php 
                    
                    if (isset($_GET['msg_id'])){
                       $message_id = $_GET['msg_id'];
                       
                      $update_msg2 = "update messages set status = 'read' where msg_id = '$message_id'";
                     $run_update2 = mysqli_query($connect, $update_msg2);
                     
                       $select2 = "select * from messages where msg_id ='$message_id'";
                       $run_select2 = mysqli_query($connect, $select2);
                       $row3 = mysqli_fetch_array($run_select2);
                       
                     $mesg_content = $row3['content'];
                     $mesg_title = $row3['title'];  
                     $mesg_date = $row3['date'];
                     $mesg_sender = $row3['sender'];
                     $mesg_receiver = $row3['receiver'];
                     $mesg_reply = $row3['reply'];
                     
                     
                     
                    $select3 = "select * from users where user_id = '$mesg_sender'";
                    $run_select3 = mysqli_query($connect, $select3);
                    $row4 = mysqli_fetch_array($run_select3);
                    
                    $sender = $row4['name'];
                    $sender_image = $row4['user_image'];
                    
                    
                    
                    }
                    
                     echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$sender_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:14px; text-transform: capitalize;'><a href='user_profile.php?user_id=$mesg_sender'>$sender</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px; font-size:13px;'><i class='fa fa-clock-o' style='font-size:12px;'></i> $mesg_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:13px;text-transform: capitalize; padding:3px; '> $mesg_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:30px; padding-bottom:20px; margin-bottom:10px;' > $mesg_content </p>
                            </div>    
                           
                        </div>
                    </div> ";      
                              
                         
                
       if($mesg_reply !== 'no reply'){
           
 $select4 = "select * from users where user_id = '$mesg_receiver'";
 $run_select4 = mysqli_query($connect, $select4);
 $row5 = mysqli_fetch_array($run_select4);
 
 $receiver_img =$row5['user_image'];
 $rec_name = $row5['name'];
  echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
      <div class='col-9 col-lg-10' style='margin-left:15px;margin-top:8px; float:right;'>
                            <h5 class='text-right' style='font-size:14px; text-transform: capitalize; margin-right:-20px;'><a href='user_profile.php?user_id=$mesg_receiver'>$rec_name</a></h5>
                            <p class='text-right' style='color:#b2b2b2;margin-top:-5px;font-size:13px; margin-right:-20px;'><i class='fa fa-clock-o' style='font-size:12px;'></i> $mesg_date</p>
                        </div>
                        <div class='col-2 col-lg-1'><img class='rounded-circle' height='50' width='50' src='assets/img/$receiver_img' style='margin-left:0px; margin-bottom:18px; float:right; margin-right:-20px;'></div>
                        
                        <div class='col-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            
                             <p class='text-right' style ='font-size:14px; margin-right:20px; padding:20px; margin-bottom:10px;' > $mesg_reply</p>
                            </div>    
                           
                        </div>
                    </div> ";      
 
 
       }                    
         else {
           
            
         echo "<form method='post'>
                 <div class = 'row'>
            <div class='container'>
                    <textarea class='form-control' rows='3' name = 'message_reply' required='required' spellcheck='true' placeholder='Reply to this Message' style='margin-top:22px;font-size:18px;height:85px;'></textarea>
                <button class='btn btn-dark btn-sm float-right' type='submit' name ='reply'  style='margin-top:18px;width:191px;padding-bottom:11px;padding-top:3px;margin-right:10px;padding-left:14px;height:41px;'>Reply <i class='fa fa-send-o' style='margin-left:5px;margin-top:3px;'></i></button>
            </div></div></form>
                <br>
";
            
                       
             if (isset($_POST['reply']))
             {
                  $reply_msg = addslashes($_POST['message_reply']);
        
                        $update_msg = "update messages set reply = '$reply_msg' where msg_id = '$message_id'";
                        $run_update = mysqli_query($connect, $update_msg);
                        
                       if ($run_update){
                           echo"<script> window.open('single_message.php?msg_id=$message_id','_self')</script>";
                       }                     
                        
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