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
    header ("location:display.php");
    

    
    



?>