<!doctype html>
<html>
<head>
<meta charset = "utf-8">
<meta http-equiv = "X-UA-Compatible" content = "IE=edge">
<meta name =  "viewport"  content = "width = device-width initial-scale = 1">

<link href = "styles/bootstrap.min.css" rel = "stylesheet">
<link href = "styles/bootstrap-theme.min.css" rel = "stylesheet">
<link href = "styles/bootstrap-social.css" rel="stylesheet">
<link href= "styles/font-awesome.css" rel="stylesheet">
<link href= "styles/personalstyles.css" rel="stylesheet">
<link rel ="icon" href="images/favicon.ico">
    
<title>Tone Social Network </title>
    </head>
    <body>
            <div class="navbar navbar-inverse navbar-static-top" role ="navigation" > 
                <div class="container">                
                    <div class="navbar-header">
                        <a class="navbar-brand" href="index.php"><big class="mybrand">Tone <i class="fa fa-podcast"></i></big></a>
                    </div>
                    <form class="navbar-form form-group form-inline navbar-right hidden-xs" method="post" action="">
                        <input class="form-control" type="username" name="username" placeholder="Username">&nbsp;
                        <input class="form-control" type ="password" name="password" placeholder="Password">&nbsp;
                        
                        <input class="form-control mynavbtn" type ="submit" value="Login">
                      
                    </form>
                </div>            
        </div>
        <div class="jumbotron">
            <div class="container">              
                 
                <div class="row">
                    
                    <div class="col-xs-12 col-sm-8 col-md-7 col-sm-offset-5" >
                         
                <form class="form-horizontal register-form" role="form">
                    <h2 class="col-sm-10 col-sm-offset-1"> Register Now</h2>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label" >First Name</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your First Name">
                                </div>
                         </div>
                     <div class="form-group">
                        <label for="lastname" class="col-sm-3 control-label" >Last Name</label>
                         <div class="col-sm-9">
                         <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Last Name">
                                </div>
                         </div>

                  <div class="form-group">
                        <label for="username" class="col-sm-3 control-label" >Username</label>
                         <div class="col-sm-9">
                         <input type="username" class="form-control" id="username" name="username" placeholder="Enter Your Username">
                                </div>
                         </div>
                     <div class="form-group">
                        <label for="password" class="col-sm-3 control-label" >Password</label>
                         <div class="col-sm-9">
                         <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                                </div>
                         </div>
                      <div class="form-group">
                        <label for="password" class="col-sm-3 control-label" >Confirm Password</label>
                         <div class="col-sm-9">
                         <input type="password" class="form-control" id="password" name="password" placeholder="Re-Enter Your Password">
                                </div>
                         </div>

                      <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label" >Telephone</label>
                         <div class="col-sm-9">
                         <input type="tel" class="form-control" id="firstname" name="firstname" placeholder="Enter Your Telephone">
                                </div>
                         </div>
                    <div class="form-group">
                        <label for="radio" class="col-sm-3 control-label" >Gender</label>

                         <div class="col-sm-3 ">
                             <label class="radio-inline"><input type="radio" > Male            
                             </label>
                                </div>
                        
                        <div class="col-sm-3 ">
                         <label class="radio-inline"><input type="radio" > Female            
                             </label>
                                </div>
                        </div>
                    <div class="form-group">
                        <label for="firstname" class="col-sm-3 control-label">City</label>
                         <div class="col-sm-9">
                         <select class="form-control">
                             <option>Select your City of Residence</option>
                             <option>Lagos</option>
                             <option>Abuja</option>
                             <option>Port-Harcout</option>
                             </select>
                                </div>
                         </div>
                              <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                         <label class="checkbox-inline"><input type="checkbox" > Subscibe to our <a href="#" >Newsletters and Promotions  </a>         
                             </label>
                        </div>
                            <div class="col-sm-8  col-sm-offset-2">
                         <label class="checkbox-inline"><input type="checkbox" > Receive Emails about  our Vendors and Outlets   
                             </label>
                                </div>

                        </div>

                     <div class="col-sm-5 col-sm-offset-3">
                         <div class="btn-group btn-group-lg">
                         <button type="submit" class="btn btn-success">
                         Register Now!
                         </button>                       


                         <button type="submit" class="btn btn-danger">
                         Reset
                         </button>

                       </div>
                </div>
         
        </form>
                    </div>
                   
                </div>
        </div>
            </div>
       
             <div class = 'row' style='margin-top:36px; '>

                        <div class='col-xs-5'><img class='rounded-circle' height='50' width='50' src='assets/img/$user_image' style='margin-left:15px; margin-bottom:18px;'></div>
                        <div class='col-xs-5' style='margin-left:15px; margin-top:8px;'>
                            <h5 class='text-left' style='font-size:16px; text-transform: capitalize;'><a href='user_profile.php?user_id=$user_id'>$user_name</a></h5>
                            <p class='text-left' style='color:#b2b2b2;margin-top:-5px; margin-left:-1px;'><i class='fa fa-clock-o' style='font-size:15px;'></i> $date</p>
                        </div>
                        <div class='col-lg-8' style='margin-top:13px; background-color:#eeeeee;'>
                            <div>
                            <p class = 'text-left' style ='font-size:14px; margin-left:20px; padding-bottom:20px; margin-bottom:10px;' > $com </p>
                            </div>    
                           
                     
                        </div>
                    </div><br> ";
        <script src ="js/jquery-3.1.1.js"></script>
<script src = "js/bootstrap.min.js"></script>
    </body>
</html>
