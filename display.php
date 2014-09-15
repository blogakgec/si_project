<html>
<head>
<link type="text/css" rel="stylesheet" href="css/display.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
</head>
    <?php
            if(isset($_SESSION['email'])) {
            header("Location:login_temp.php");
            }

                     
         ?>
<body>
<div class="wrapper">
<div class="ribbon">
<p>Profile Details</p>
</div>
<div class="picture">
<img width="150px" height="150px">
</div>
    
    
    
<form enctype="multipart/form-data" method="post" action="process_profile.php">
<input type="file" class="filestyle" data-buttonName="btn-primary">
<input type="text" placeholder="Work">
<input type="text" placeholder="Education">
<input type="text" id="datepicker">
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