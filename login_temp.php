<!doctype html>
<html>
<head>
</head>
    <?php
        include 'includes/connection.php';
        ?>
    <form name="myform" method="post" action="process_login.php" onsubmit="return(validate());">
        <input type="emaii" name="email" placeholder="email" />
        <input type="pword" name="pword" placeholder="password" />
        <input type="submit" value="login" />
        </form>
    <body>
        
    
    </body>
</html>