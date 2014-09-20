<?php

    include 'includes/connection.php';
    session_start();
    $email=$_POST['email'];
    $password=$_POST['pword'];
    echo $email;
    echo $password;
        $query="SELECT email,password 
        FROM accounts   WHERE email='{$email}' AND password='{$password}'  "; 
        
        if($result=mysqli_query($con,$query))
        {
            $result_next= mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo $result_next['password'];
            if($result_next['password'] === $password)
            {
                echo "login sucessful";
                $_SESSION['email']=$email;
                header("location:display.php");
                
            }
            else
            {
                echo "login failed";
            }
        }

?>