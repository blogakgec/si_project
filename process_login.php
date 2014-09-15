<?php

    include 'includes/connection.php';
    session_start();
    $email=$_POST['email'];
    $password=$_POST['password'];
    

    echo $email;
    echo $password;
        $query="SELECT email,password 
        FROM accounts   WHERE email='$email' AND password='$password' "; 
        
        if($result=mysqli_query($con,$query))
        {
            echo "sucess";
            $result_num=mysqli_num_rows($result);
            var_dump($result);
            if($result_num ==0)
            {
                echo "login falied";
                mysql_error();
            }
        }
            else
            {
                $_SESSION['email']=$email;
            }
        $result=NULL;
        
?>



















/*
    include 'includes/connection.php';
    session_start(); 
    $email=$_POST['email'];
    $password=$_POST['pword'];
    echo $email;
    echo $password;
        $query="SELECT email,password 
        FROM accounts   WHERE email=$email AND password=$password "; 
        
        if($result=mysqli_query($con,$query))
        {
            echo "sucess";
            $result_num=mysqli_num_rows($result);
            if($result_num ==0)
            {
                echo "login falied";
                mysql_error();
            }
        }
            else
            {
                $_SESSION['email']=$email;
                header("location:display.php");
            }
*/
?>