<?php
    include 'includes/connection.php';
    $work=mysql_real_escape_string($_POST["work"]);
    $edu=mysql_real_escape_string($_POST["education"]);
    $date=mysql_real_escape_string($_POST["date"]);
    $name=mysql_real_escape_string($_POST["full_name"]);
    $city=mysql_real_escape_string($_POST["city"]);
    $country=mysql_real_escape_string($_POST["country"]);

    $imageName= mysql_real_escape_string($_FILES["image"]["name"]);
    $imageData= mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType= mysql_real_escape_string($_FILES["image"]["type"]);

    echo $name;
        session_start();
                    $email= $_SESSION['email'];
                    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
                    $result=mysqli_query($con,$subquery);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        echo $imageData;
                        
        if(substr($imageType,0,5) == "image")
                {
                    $query= "UPDATE profile
                            SET full_name='{$name}' ,
                                image='{$imageData}',
                                work='{$work}' ,
                                dob='{$date}' ,
                                education= '{$edu}' ,
                                city= '{$city}' ,
                                country='{$country}' 
                                WHERE user_id= {$row['user_id']} ";
                if(mysqli_query($con,$query))
                {
                    echo "sucessful";
                    header("location:view-blog1.php");
                }
                else
                {
                    echo "error";
                    echo mysql_error();
                }
            }
            else
            {
                echo "only images are allowed";
            }
          
?>