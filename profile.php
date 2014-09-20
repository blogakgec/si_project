b<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        
       
            
          <?php
        session_start();

        if( isset($_SESSION['username']) )
        {
            header("location:login_form.php");
        }       
        
        
        
        ?>
        
        <p>congratulations you have sucessfully signed up</p>
        <button type="button" ><a href="dashboard.php">click here to create a new blog</a></button>
        <a href="logout.php">logout</a>
        
    </body>


</html>