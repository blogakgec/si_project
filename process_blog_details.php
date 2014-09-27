<?php
    session_start();
    include 'includes/connection.php';
    $blog_name= $_POST['blog_title'];
    

    //getting the user_id of the current user
    $email= $_SESSION['email'];
    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
        
    $result=mysqli_query($con,$subquery);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo $row['user_id'];
    
    $insert= "INSERT INTO blogs(user_id,blog_name)
                VALUES('{$row['user_id']}','{$blog_name}') ";
    if(mysqli_query($con,$insert))
    {
        echo "sucessful";
        $_SESSION["blog_name"]=$blog_name;
        header("location:view-blog1.php");
    }
    else
    {
        echo "failed";
    }
    
    




?>