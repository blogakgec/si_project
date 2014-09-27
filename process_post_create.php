<!doctype html>
<html>
    <head>
    
    
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['email'])) {
            header("Location:login2%20.php");
            }
                     
         ?>
        <?php
            include 'includes/connection.php';
            session_start();
            $blog_id=$_GET['create'];
            $email= $_SESSION['email'];
            $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
        
            $result=mysqli_query($con,$subquery);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo $row['user_id'];
            $blog_id = $blog_id;
            echo $blog_id;
            
            $post_title=$_POST['post_title'];
            $post_content=$_POST['post_content'];
            echo $post_title;

            $blog_query= "INSERT INTO posts(user_id,blog_id,post_title,post_content)
                            VALUES('{$row['user_id']}',
                                    '{$blog_id}',
                                    '{$post_title}',
                                    '{$post_content}') ";
                            
            if(mysqli_query($con,$blog_query))
            {echo "sucess";
             header("location:blog_view.php");
            }
            else
            {
                echo "failed";
            }
            

            
        ?>
    </body>



</html>