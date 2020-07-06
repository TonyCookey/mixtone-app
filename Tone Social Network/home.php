<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// this is the file that houses the functions  
// retrieving list of topics from the database

include 'includes/connection.php';
// function for get topics from database
function getTopics(){
    global $connect;
    $get_topics = " select * from topics ";
$run_topics = mysqli_query($connect, $get_topics);

while ($row = mysqli_fetch_array($run_topics)) {
 
    $topic_id = $row['topic_id'];
    $topic_title = $row['topic_title'];
    
 
    echo" <option value = '$topic_id'>$topic_title</option>";
}

}
//funtion for inserting posts into database
function insertPost(){
global $connect;
global $user_id;
if(isset($_POST['post_btn'])){
    
    $title = addslashes($_POST['post-title']);
    $content = addslashes($_POST['post-content']);
    $topic_id = $_POST['topics'];
    
    $insert = "insert into posts (user_id,topic_id,post_title,post_content,post_date) values('$user_id','$topic_id','$title','$content',NOW())";
    $run_insert = mysqli_query($connect, $insert);
    if($run_insert){
        echo "<h5>Posted to Timeline </h5>";
        $update = "update users set posts = 'yes' where user_id = '$user_id'";
        $run_update = mysqli_query($connect, $update);
        
        
    }
}
}
//function for getting posts from database to timeline

function getPosts()
{
    global $connect;
    $per_page = 10;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        
    }
    else{
        $page = 1;
        
    }
    $start_from = ($page - 1) * $per_page; 
    
    $get_posts ="select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
    $run_posts = mysqli_query($connect, $get_posts);
    
    
    
    
    while ($row_posts = mysqli_fetch_array($run_posts)) {
        
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $likes = $row_posts['likes'];
        
       
        //getting the user that posted it
        
        $user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($connect, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['name'];
        $user_image =$row_user['user_image'];
        
        //displaying all posts
        
        echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $post_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:16px;text-transform: capitalize; padding:3px; '> $post_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:30px; padding-bottom:20px; margin-bottom:10px;padding-right:10px; margin-right:5px;' > $content </p>
                            </div>    
                           <div class='btn-group float-right' role='group' style='height:37px;margin-top:-2px;'>
                                <a class='btn btn-dark btn-sm' href='single.php?post_id=$post_id'>Comment<i class='fa fa-comments-o' style='margin-left:5px;margin-top:3px;'></i></a>
                            </div>
                        </div>
                    </div> ";      
    }
   include 'pagination.php';
    
    }
    
    function single_post(){
        global $connect;


        if (isset($_GET['post_id'])){
            $single_post_id = $_GET['post_id'];
            
            $get_posts ="select * from posts where post_id = $single_post_id ";
            $run_posts = mysqli_query($connect, $get_posts);    
            $row_posts = mysqli_fetch_array($run_posts);
        
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        
        
        //getting the user that posted it
        
        $user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($connect, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['name'];
        $user_image =$row_user['user_image'];
        
        //displaying single posts
        
        echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $post_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:16px;text-transform: capitalize; padding:3px; '> $post_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:20px; padding-right:10px; padding-bottom:20px; margin-bottom:10px;' > $content </p>
                            </div>    
                           
                        </div>
                    </div><br> "
                . 
                "
 <div class = 'row'>
 <div class='container'>
<form method='post'>
 <textarea class='form-control' rows='4' name = 'comment' required='required' spellcheck='true' placeholder='Comment on this Post' style='margin-top:22px;font-size:14px;'></textarea>
    <button class='btn btn-dark btn-sm float-right' type='submit' name ='reply'  style='margin-top:18px;width:191px;padding-bottom:10px;padding-top:3px;margin-right:10px;padding-left:4px;height:38px;'>Post Comment <i class='fa fa-comments-o' style='margin-left:5px;margin-top:3px;'></i></button>
</form>
</div></div>
<br><br>
"
                ;   
       
        if (isset($_POST['reply']))
        {
            $comment = addslashes($_POST['comment']);
           //getting the user that is psoting the comment
                        $current_user = $_SESSION['user_email'];
                        $get_user = "select user_id,name,user_image from users where user_email = '$current_user'";
                        $run_user = mysqli_query($connect, $get_user);
                        $row = mysqli_fetch_array($run_user);
                                            
                        
                       $com_user_name = $row['name'];
                       $user_id = $row['user_id'];
                       $comm_image = $row['user_image'];
                       
            $insert = "insert into comments (post_id,user_id,comment,date)"
                    . "values ('$post_id','$user_id','$comment',NOW())"; 
                    $run = mysqli_query($connect, $insert);
                    
                    if($run)
                    {
                        echo "<h6 class = 'text-left' style ='margin-left:10px;'> <i class ='fa fa-thumbs-o-up'></i> Your Comment has been Posted </h6>";
                    }
        }
        
         include 'functions/comment.php';
        }  
    }
    
    
    
    function topicThread()
{
    global $connect;
   
    
    $per_page =10;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        
    }
    else{
        $page = 1;
        
    }
     $start_from = ($page - 1) * $per_page; 
     if(isset($_GET['topic'])){
         $topic_id = $_GET['topic'];
         
        $get_title = "select * from topics where topic_id = $topic_id ";
        $topic_title = mysqli_query($connect, $get_title);
        $row_title = mysqli_fetch_array($topic_title);
        $title= $row_title['topic_title'];       
         
          }
        
    
    $get_posts ="select * from posts where topic_id =' $topic_id' ORDER by 1 DESC LIMIT $start_from, $per_page ";
    $run_posts = mysqli_query($connect, $get_posts);
       
  
    while ($row_posts = mysqli_fetch_array($run_posts)) 
                {
        
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $likes = $row_posts['likes'];
        
       
        //getting the user that posted it
        
        $user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($connect, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['name'];
        $user_image =$row_user['user_image'];
        
        //displaying all posts
        
        echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $post_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:16px;text-transform: capitalize; padding:3px; '> $post_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:30px; padding-bottom:20px; margin-bottom:10px;' > $content </p>
                            </div>    
                           <div class='btn-group float-right' role='group' style='height:37px;margin-top:-2px;'>
                                <a class='btn btn-dark btn-sm' href='single.php?post_id=$post_id'>Comment<i class='fa fa-comments-o' style='margin-left:5px;margin-top:3px;'></i></a>
                            </div>
                        </div>
                    </div> ";      
    }
    $query = "select * from posts where topic_id = '$topic_id'";
    $result = mysqli_query($connect, $query);

//count the total records
$total_posts = mysqli_num_rows($result);
        //using te math celing function to find the integer value
        $total_pages = ceil($total_posts / $per_page);
        
        //going to first page


echo " <nav style ='margin-top:50px;'>
        <ul class='pagination'>
            <li class='page-item'><a class='page-link' href = 'topic.php?topic=$topic_id&page=1'>First Page</a></li>";
             for ($i=1; $i<= $total_pages; $i++)
             {
              echo "<li class='page-item'><a class='page-link' href = 'topic.php?topic=$topic_id&page=$i'>$i</a></li>";
            }
            echo"<li class='page-item'><a class='page-link' href = 'topic.php?page=$total_pages&topic=$topic_id'>Last Page</a></li>
        </ul>
    </nav>";
    
    }
    
    
    //function for search engine
    
    function GetResults()
{
    global $connect;
   
    
    $per_page = 5;
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        
    }
    else{
        $page = 1;
        
    }
     $start_from = ($page - 1) * $per_page; 
     if(isset($_GET['search'])){
         $search = $_GET['search_query'];
          }
            
    $get_posts ="select * from posts where post_title LIKE '%$search%' OR post_content LIKE '%$search%'  ORDER by 1 DESC LIMIT $start_from, $per_page ";
    $run_posts = mysqli_query($connect,$get_posts);
    
    
   
       
  
    while ($row_posts = mysqli_fetch_array($run_posts)) 
                {
        
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $likes = $row_posts['likes'];
        
       
        //getting the user that posted it
        
        $user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($connect, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['name'];
        $user_image =$row_user['user_image'];
        
        //displaying all posts
        
       echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $post_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:16px;text-transform: capitalize; padding:3px; '> $post_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:30px; padding-bottom:20px; margin-bottom:10px;' > $content </p>
                            </div>    
                           <div class='btn-group float-right' role='group' style='height:37px;margin-top:-2px;'>
                                <a class='btn btn-dark btn-sm' href='single.php?post_id=$post_id'>Comment<i class='fa fa-comments-o' style='margin-left:5px;margin-top:3px;'></i></a>
                            </div>
                        </div>
                    </div> ";      
    }
   

//count the total records
 $t_posts ="select * from posts where post_title LIKE '%$search%' OR post_content LIKE '%$search%'";
    $n_posts = mysqli_query($connect,$t_posts);
    $total_posts = mysqli_num_rows($n_posts);
        //using te math celing function to find the integer value
        $total_pages = ceil($total_posts / $per_page);
        
         if ($total_posts == 0)
    {
        echo "<br><p style='font-size:16px; color:grey;'> No result found </p>";
    }
        //going to first page

echo " <nav style ='margin-top:50px; margin-left:50px;'>
        <ul class='pagination'>
            <li class='page-item'><a class='page-link' href = 'results.php?page=1&search_query=$search&search=search'>First Page</a></li>";
             for ($i=1; $i< $total_pages; $i++)
             {
              echo "<li class='page-item'><a class='page-link' href = 'results.php?page=$i&search_query=$search&search=search'>$i</a></li>";
            }
            echo"<li class='page-item'><a class='page-link' href = 'results.php?page=$total_pages&search_query=$search&search=search'>Last Page</a></li>
        </ul>
    </nav>";
    }
    
    
    
    
    
    
    function userPosts($pages)
{
    global $connect;
    $per_page =10;
    
    
    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        
    }
    else{
        $page = 1;
        
    }
    if(isset($_GET['user_id']))
    {
        $post_user = $_GET['user_id'];
    }
    $start_from = ($page - 1) * $per_page; 
    
    $get_posts ="select * from posts where user_id = '$post_user' ORDER by 1 DESC LIMIT $start_from, $per_page ";
    $run_posts = mysqli_query($connect, $get_posts);
    $num = mysqli_num_rows($run_posts);
    
    if($num == 0){
        echo "<br><p>No Posts</p>";
    }
  
    
                        $user2 = $_SESSION['user_email'];
                        $get_usr = "select * from users where user_email = '$user2'";
                        $run_usr = mysqli_query($connect, $get_usr);
                        $row9 = mysqli_fetch_array($run_usr);
                        //to get number of posts of a particular user
                        
                        
                      
                       $usr_id = $row9['user_id'];
                       
    while ($row_posts = mysqli_fetch_array($run_posts)) {
        
        
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $post_title = $row_posts['post_title'];
        $content = $row_posts['post_content'];
        $post_date = $row_posts['post_date'];
        $likes = $row_posts['likes'];
        
        
        
         if($user_id == $usr_id){
     $delete_btn= "<a class='btn btn-danger' href='functions/delete_posts.php?post_id=$post_id&user_id=$user_id'>Delete<i class='fa fa-home' style='margin-left:5px;margin-top:3px;'></i></a>";
  }
        
        //getting the user that posted it
        
        $user = "select * from users where user_id = '$user_id'";
        $run_user = mysqli_query($connect, $user);
        $row_user = mysqli_fetch_array($run_user);
        $user_name = $row_user['name'];
        $user_image =$row_user['user_image'];
        
        //displaying all posts
        echo "<div class='row' style='margin-top:36px; margin-left:5px;'>
                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px;margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $post_date</p>
                        </div>
                        <div class='col-lg-12' style='margin-top:-13px;'>
                            <div style='background-color:#ffffff;'>
                            <h4 style = 'color:black; font-size:16px;text-transform: capitalize; padding:3px; '> $post_title</h4>
                             <p class = 'text-left' style ='font-size:14px; margin-left:30px; padding-bottom:20px; margin-bottom:10px;' > $content </p>
                            </div>    
                           <div class='btn-group float-right' role='group' style='height:37px;margin-top:-2px;'>";
             if($user_id == $usr_id){
     echo "<a class='btn btn-danger' href='functions/delete_posts.php?post_id=$post_id&user_id=$user_id'>Delete<i class='fa fa-home' style='margin-left:5px;margin-top:3px;'></i></a>";
  }
                          

                echo "<a class='btn btn-dark btn-sm' href='single.php?post_id=$post_id'>Comment<i class='fa fa-comments-o' style='margin-left:5px;margin-top:3px;'></i></a>
                            </div>
                        </div>
                    </div> ";
       
        
    }
    //using the math celing function to find the integer value
    $t_posts ="select * from posts where user_id = '$post_user'";
    $n_posts = mysqli_query($connect, $t_posts);
    $total_posts = mysqli_num_rows($n_posts);
    $total_pages = ceil(($total_posts/$per_page));
        
        //going to first page

    
echo " <nav style ='margin-top:50px; margin-left:50px;'>
        <ul class='pagination'>
            <li class='page-item'><a class='page-link' href = '$pages.php?page=1&user_id=$post_user'>First Page</a></li>";
             for ($i=1; $i<=$total_pages; $i++)
             {
              echo "<li class='page-item'><a class='page-link' href ='$pages.php?page=$i&user_id=$post_user'>$i</a></li>";
            }
            echo"<li class='page-item'><a class='page-link' href ='$pages.php?page=$total_pages&user_id=$post_user'>Last Page</a></li>
        </ul>
    </nav>";
    
    }
    
    function user_profile(){
        global $connect;
        if(isset($_GET['user_id'])){
            $user_id = $_GET['user_id'];
            
            
            $select = "select * from users where user_id = '$user_id'";
            $run = mysqli_query($connect, $select);
            
            $row = mysqli_fetch_array($run);
                    
             $name = $row['name'];
            $email = $row['user_email'];
            $image = $row['user_image'];
            $occupation = $row['occupation'];
            $gender = $row['gender'];
            $country = $row['user_country'];
            $joined = $row['register_date'];
            $last_login = $row['last_login'];
            
            echo " <div class='row'>
        <div class='col'>
            <div class='box' style='margin-left:22px;'>
            <img class='img-responsive rounded-circle' src='assets/img/$image' style='height:145px;width:152px;'>
                <h3 class='name' style='font-size:25px;color:#222222;text-transform:capitalize;'>$name</h3>
                <h6 style='color:#d0d0d0; text-transform:capitalize; padding-bottom:3px;'>$occupation</h6>
                <p style='font-size:11px;'>$gender</p>
                <p style='font-size:11px;'>$country</p>
                <p style='font-size:11px;'>Joined: $joined</p>
                <p style='font-size:11px;'>last seen: $last_login</p>
                <a class='btn btn-dark btn-sm' style='margin-top:10px;' role='button' href='message.php?user_id=$user_id'>Message&nbsp;<i class='fa fa-envelope' style='padding:3px;margin-right:4px;'></i></a></div>
        </div>
    </div>"
                    ;
            echo "<br><br><h3> User's Posts </h3>";        
            userPosts('user_profile');         
            
            
        }
        else{
            echo "<h3> Invalid User </h3>";
            echo"<script>window.open('welcome.home.php','_self')</script>";
        }
    }
    
    
    function search_user()
{
    global $connect;
    if(isset($_GET['search'])){
         $search = $_GET['search_query'];
          }
            
    $get_user ="select * from users where name LIKE '%$search%' OR user_email LIKE '%$search%'";
    $run_user = mysqli_query($connect,$get_user);
     
    $row = mysqli_fetch_array($run_user);
        
        $name = $row ['name'];
        $image =$row['user_image'];
        $user_id = $row['user_id'];
                           
                           
         
         
         echo "<div class<div class='row' style = 'padding:5px; background-color:#f7f9fc; margin-left:10px;'>
        <div class='col-1'><img class='rounded-circle float-left' title = '$name' src='assets/img/$image' style='height:40px;width:39px;'>
            </div>
        <div class='col-7'>
            <h5 class='text-left'style='padding:10px; text-transform:capitalize; margin-left:10px; margin-right:10px;'><a style='color:#5a6268;font-size:14px; text-decoration:none;' href = 'user_profile.php?user_id=$user_id'>$name</a></h5>
                </div>
               <div class ='col-3 col-lg-4'> <a class='btn btn-dark btn-xs' style='margin-top:5px; font-size:13px;float:right; ' role='button' href='message.php?user_id=$user_id'>Message&nbsp;<i class='fa fa-envelope' style='padding:3px;margin-right:4px;'></i></a>
        </div>
    </div> <br>";
        }
    
