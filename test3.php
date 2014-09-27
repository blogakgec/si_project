<?php
    include 'includes/connection.php';
    session_start();
     $email= $_SESSION['email'];
                    echo $email;
                    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
                    $result=mysqli_query($con,$subquery);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                     echo "query not qwrking";   
                    echo $row['user_id'];
    $query = "SELECT * FROM profile WHERE user_id=7 ";
    $query_result= mysqli_query($con,$query);
    $query_row= mysqli_fetch_array($query_result,MYSQLI_ASSOC);
   
    header ("content-type: image/jpeg ");
    echo $query_row['image'];
    
?>