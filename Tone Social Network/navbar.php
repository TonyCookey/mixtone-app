<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <nav class="navbar navbar-light navbar-expand-md bg-info navigation-clean-search">
       <?php  global $connect;
       $num_unread ="";
                        $user = $_SESSION['user_email'];
                        $get_user = "select * from users where user_email = '$user'";
                        $run_user = mysqli_query($connect, $get_user);
                        $row = mysqli_fetch_array($run_user);
                        //to get number of posts of a particular user
                        
                        
                       $name = $row['name'];
                       $user_id = $row['user_id'];
                       $image = $row['user_image'];
                       $occupation = $row['occupation'];
                       $password = $row['']
                       
                       
                       $query_number_of_posts = "select * from posts where user_id = '$user_id'";
                        $run_query_number_of_posts = mysqli_query($connect, $query_number_of_posts);
                        $row_number_of_posts = mysqli_num_rows( $run_query_number_of_posts);
                        
                         $select_msg = "select * from messages where receiver = '$user_id' AND status = 'unread'";
                           $run_select_msg = mysqli_query($connect,$select_msg);
                          
                           $num_unread = mysqli_num_rows($run_select_msg);
                         
                           ?>
     <div class="container"><a class="navbar-brand" href="welcome_home.php" data-bs-hover-animate="rubberBand" style="font-size:18px;">MixTone</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav" style="font-size:15px;">
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="all_topics.php" data-bs-hover-animate="pulse" style="font-size:13px;">Trending Topics</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="members.php" data-bs-hover-animate="pulse" style="font-size:13px;">Users</a></li>
                    <li class="nav-item d-md-none d-lg-block" role="presentation"><a class="nav-link text-white" href="welcome_home.php" data-bs-hover-animate="pulse" style="font-size:13px;">Explore</a></li>
                </ul>
                <form class="form-inline ml-auto" action="results.php" method="get">
                    <div class="form-group" style="margin-right:24px;"><label for="search-field"><i class="fa fa-search" style="height:16px;width:16px;margin-top:-4px;margin-left:0px;margin-right:-3px; margin-bottom:5px;"></i></label><input class="form-control search-field" type="search" name="search_query" placeholder="Search Topics"
                            maxlength="20" autocomplete="on" id="search-field" style="background-color:rgba(0,0,0,0.05);margin-right:0px;margin-left:10px;color:#ffffff;font-size:15px;">
                        <button class="btn btn-info action-button" value="search" name="search" type="submit" style=" margin-right:-5px;padding-right:33px;margin-left:10px;margin-top:0px;">Search</button></div>
                </form>
                        <li class="dropdown d-inline" style="padding-right:0px;margin-left:16px;margin-right:-9px;"><a class="dropdown-toggle text-light dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="false" href="#"> <?php echo $_SESSION['user_email']?> &nbsp;</a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="account.php?user_id=<?php echo $user_id;?>">Account</a><a class="dropdown-item" role="presentation" href="user_profile.php?user_id= <?php echo $user_id;?>">Profile</a><a class="dropdown-item" role="presentation" href="logout.php">Log Out</a></div>
                        </li>
               
        </div>
        </div>
    </nav>
