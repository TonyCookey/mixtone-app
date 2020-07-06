<?php
include('includes/connection.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getTopics() {
    global $connect;
    
        $get_topics = " select * from topics ";
        $run_topics = mysqli_query($connect, $get_topics);

        while ($row = mysql_fetch_array($run_topics)) {
 
        $topic_id = $row['topic_id'];
        $topic_title = $row['topic_title'];
    
        echo "<li><a href = 'home.php?topic=$topic_id'>$topic_title</a> </li>";
    }
    
}

