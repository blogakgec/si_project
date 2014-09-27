<?php
include 'includes/connection.php';
 /*   session_start();
    //Image Processing
    phpinfo();
    $cover = $_FILES['image']['name'];
    $cover_tmp_name = $_FILES['image']['tmp_name'];
    $cover_img_path = '/images/';
    $type = exif_imagetype($cover_tmp_name);

//if ($type == (IMAGETYPE_PNG || IMAGETYPE_JPEG || IMAGETYPE_GIF || IMAGETYPE_BMP)) {
        //$cover_pre_name = md5($cover);  //Just to make a image name random and cool :D
        switch ($type) {    #There are more type you can choose. Take a look in php manual -> http://www.php.net/manual/en/function.exif-imagetype.php
            case '1' :
                $cover_format = 'gif';
                break;
            case '2' :
                $cover_format = 'jpg';
                break;
            case '3' :
                $cover_format = 'png';
                break;
            case '6' :
                $cover_format = 'bmp';
                break;

            default :
                die('There is an error processing the image -> please try again with a new image');
                break;
        }
    $cover_name = $cover_pre_name . '.' . $cover_format;
      //Checks whether the uploaded file exist or not
            if (file_exists($cover_img_path . $cover_name)) {
                $extra = 1;
                while (file_exists($cover_img_path . $cover_name)) {
        $cover_name = md5($cover) . $extra . '.' . $cover_format;
                    $extra++;
                }
            }
     //Image Processing Ends

*/
$work=mysql_real_escape_string($_POST["work"]);
$edu=mysql_real_escape_string($_POST["education"]);
$date=mysql_real_escape_string($_POST["date"]);
$name=mysql_real_escape_string($_POST["full_name"]);
$city=mysql_real_escape_string($_POST["city"]);
$country=mysql_real_escape_string($_POST["country"]);
$imageName= mysql_real_escape_string($_FILES["image"]["name"]);
    $imageData= mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
    $imageType= mysql_real_escape_string($_FILES["image"]["type"]);
    echo $imageType;
session_start();
                    $email= $_SESSION['email'];
                    $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
                    $result=mysqli_query($con,$subquery);
                    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                        
                    echo $row['user_id'];
//$query= "UPDATE profile 
        //SET full_name={$name},work={$work},dob={$date},education={$edu} 
        //WHERE user_id= '{$row['user_id']}' ";
if(substr($imageType,0,5) == "image")
    {

            $query = "INSERT INTO profile(user_id,full_name,image,work,dob,education,city,country)
  VALUES('{$row['user_id']}','{$name}','{$imageData}','{$work}','{$date}','{$edu}','{$city}','{$country}') ";
       if(mysqli_query($con,$query))
       {
           echo "profile updation sucessful";
           header("location:view-blog1.php");
       }
        else
        {
            echo "error..";
            echo mysql_error();
        }
}
echo "only images are allowed";

?>


