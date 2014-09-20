<html>
<head>
<link type="text/css" rel="stylesheet" href="css/display.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
</head>
    <?php
            session_start();
            if(!isset($_SESSION['email'])) {
            header("Location:login2%20.php");
            }
            echo $_SESSION['email'];
                     
         ?>
    
<body>
<div class="wrapper">
<div class="ribbon">
<p>Profile Details</p>
</div>
<div class="picture">
<img width="150px" height="150px">
</div>
    
    
    <?php
 /*       include 'includes/connection.php';
        $email=$_SESSION['email'];
        $subquery= "SELECT user_id FROM accounts WHERE email='{$_SESSION['email']}  LIMIT 1";
        $result= mysqli_query($con,$subquery);
        $result_fetch= mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo $result_fetch['user_id'];

        $query= "UPDATE profile SET set='1' WHERE user_id={$result_fetch['user_id']} "; 
        if (!mysqli_query($con,$query)) {
  die('Error: ' . mysqli_error($con));
}
   */     
    ?>
    
<form enctype="multipart/form-data" method="post" action="process_profile.php">
<input type="text" placeholder="Name" name="full_name"> 
<input type="file" class="filestyle" data-buttonName="btn-primary" name="image">
<input type="text" placeholder="Work" name="work">
<input type="text" placeholder="Education" name="education">
<input type="text" id="datepicker" name="date">
<input type="submit">
</form>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
</script>
</body>
</html>