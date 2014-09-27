<?php



    include 'includes/connection.php';
    include 'includes/function.php';
    $username=mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['pword']);

    $query = "INSERT INTO accounts(username,email,password)
    VALUES('{$username}','{$email}','{$password}')";
    
    if (!mysqli_query($con,$query)) {
    die('Error: ' . mysqli_error($con));
        }
    session_start();
    $_SESSION["email"] =$email;
  /*  $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
    $result=mysqli_query($con,$subquery);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    echo $row['user_id'];
   $setup= "INSERT INTO profile(user_id)
            VALUES('{$row["user_id"]}') ";
  if(mysqli_query($con,$setup))
    {
        header ("location:display.php");
    }
    else
     mysql_error();

    */

    header("location:profile-form.php");
    



?>