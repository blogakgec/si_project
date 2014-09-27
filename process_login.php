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
                    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
                    $result=mysqli_query($con,$subquery);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    
                    $test="SELECT flag from profile WHERE user_id='{$row['user_id']}' ";
                    $test_result= mysqli_query($con,$test);
                    $test_row= mysqli_fetch_array($test_result);
                    echo $test_row['flag'];
                    if($test_row['flag'] == 0) 
                    {
                        header("location:view-blog1.php");
                        mysql_error();
                    }
                    else
                    {
                        header("location: display1.php");
                    }
                    
            }
            else
            {
                
                
                echo "login failed";
            }
        }
?>