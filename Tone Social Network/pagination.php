<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$query = "select * from posts";
$result = mysqli_query($connect, $query);

//count the total records
$total_posts = mysqli_num_rows($result);
        //using te math celing function to find the integer value
        $total_pages = ceil($total_posts / $per_page);
        
        //going to first page


echo " <nav style ='margin-top:50px;'>
        <ul class='pagination'>
            <li class='page-item'><a class='page-link' href = 'welcome_home.php?page=1'>First Page</a></li>";
             for ($i=1; $i<= $total_pages; $i++)
             {
              echo "<li class='page-item'><a class='page-link' href = 'welcome_home.php?page=$i'>$i</a></li>";
            }
            echo"<li class='page-item'><a class='page-link' href = 'welcome_home.php?page=$total_pages'>Last Page</a></li>
        </ul>
    </nav>";