<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link type="text/css" rel="stylesheet" href="css/profile-form.css">
</head>
    
    <?php

        // checking weather the session is set or not
            session_start();
            if(!isset($_SESSION['email'])) {
            header("Location:login2%20.php");
            }
            echo $_SESSION['email'];
                     
         ?>
    
    
    <?php
            //getting the user id
            include 'includes/connection.php';
            $email= $_SESSION['email'];
            $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
        
            $result=mysqli_query($con,$subquery);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo $row['user_id'];

            $query="SELECT * FROM profile WHERE user_id={$row['user_id']} LIMIT 1 ";
            $result_next=mysqli_query($con,$query);
            
            $row_next=mysqli_fetch_array($result_next,MYSQLI_ASSOC);
            echo $row_next['full_name'];
    
    ?>
    
<body>
<div class="blog">
    <p> <?php echo $row_next['full_name']; ?>  </p>
</div>
<div class="form-wrapper">
<div class="top">
<div class="triangle"></div>
<p class="ribbon">Profile Details</p>
</div>
<form enctype="multipart/form-data" method="POST" action="process_update_profile.php">
<div id="imagePreview">
    <?php  
echo '<img height="280px" width="180px" src="data:image/jpeg;base64,'.base64_encode( $row_next['image'] ).'"/>'
    ?>
    
    </div>
    
<input type="file" id="uploadFile" name="image" class="img">
<input type="text" name="full_name" value=" <?php echo $row_next['full_name']; ?>" ><div class="tag" >Full name</div>
<input type="text" name="work" value=" <?php echo $row_next['work']; ?>"><div class="tag" >Work</div>
<input type="text" name="education" value=" <?php echo $row_next['education']; ?>"><div class="tag" >Education</div>
<input type="text" name="city" value=" <?php echo $row_next['city']; ?>"><div class="tag" >City</div>
<input type="text" name="country" value=" <?php echo $row_next['country']; ?>"><div class="tag" >Country</div>
<input data-provide="datepicker" name="date" ><div class="tag">Birthday</div>
<input type="submit">
</form>
</div>
<div class="footer">
    <p>Copyright &copy 2014 site.com. All Rights Reserved.</p>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="http://eternicode.github.io/bootstrap-datepicker/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
    $(".datepicker").datepicker({
       autoclose:'true',
       clearBtn:'true'
    });
    $(function() {
    $("#uploadFile").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
  });
</script>
</body>
</html>