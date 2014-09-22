<?php
    include 'includes/connection.php';
    session_start();
                    $blog_name=$_POST['title'];
                    $email= $_SESSION['email'];
                    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
                    $result=mysqli_query($con,$subquery);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        
                    echo $row['user_id'];
                    $test= "INSERT INTO blogs(user_id,blog_name)
                            VALUES('{$row['user_id']}','{$blog_name}')";
                    if(mysqli_query($con,$test))
                    {
                        echo "sucess";
                    }
                    else
                    {
                        echo "failed"; 
                        mysql_error();
                    }
?>
                    