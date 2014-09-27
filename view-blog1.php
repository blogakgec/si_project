<?php
require_once('includes/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/view-blog.css">
<link rel="stylesheet" type="text/css" href="css/load.css">
    <link rel="stylesheet" type="text/css" href="css/new-blog.css">
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
    
 <?php
            session_start();
            $email=$_SESSION['email'];
            $subquery="SELECT * FROM accounts WHERE email='{$email}' LIMIT 1 ";
            $result=mysqli_query($con,$subquery);
            $row_r=mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $profile= "SELECT *
                       FROM  profile
                       WHERE user_id='{$row_r['user_id']}' ";
            $profile_result= mysqli_query($con,$profile);
            $profile_row= mysqli_fetch_array($profile_result,MYSQLI_ASSOC);
            
    ?>
    
<body>
<div class="wrapper">
	<div class="top"><div class="down-triangle" style="position:absolute;bottom:-20px;left:120px;z-index:2;"></div></div>
	<div class="header">
	
	<p><?php echo $profile_row['full_name']; ?> </p>
	<a href="logout.php">Logout</a>
	<div class="down-triangle" style="position:absolute;bottom:-20px;left:80px;border-top-color:#5fcbf0;"></div>
	</div>
	<div class="profile-info">
	<?php  
echo '<img height="400px" width="180px" src="data:image/jpeg;base64,'.base64_encode( $profile_row['image'] ).'"/>'
    ?>
	<div class="profile-details">
	<p><?php echo $profile_row['full_name']; ?></p>
	<p><?php echo $profile_row['work']; ?></p>
	<p><?php echo $profile_row['education']; ?></p>
	<p><?php echo $profile_row['city']; ?></p>
	</div>
	<a href="update_profile.php">Update Profile</a>
	</div>
	<div class="left-column">
	<p>All Blogs</p>
	<ul>
		<?php
            $test="SELECT * 
                    FROM blogs 
                    WHERE user_id='{$row_r['user_id']}' ";
			$query=mysqli_query($con,$test);

			// for($i=0;$i<;$i++){
			// 	echo mysql_fetch_array($query)['blog_name'];
			// }
			while($rows=mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				echo '<li><a href="#">'.$rows['blog_name'].'</a></li>';
			}
		?>
	</ul>
	</div>
	<div class="right-column">
		<a href="#" style="width:150px;margin:20px;" id="create-blog">Create New Blog</a>
		<div class="blog-name"><p>Networking</p></div>
		<div class="posts">
	</div>
	</div>
	<div class="spinner" style="display:none;">
  <div class="spinner-container container1">
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
  </div>
  <div class="spinner-container container2">
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
  </div>
  <div class="spinner-container container3">
    <div class="circle1"></div>
    <div class="circle2"></div>
    <div class="circle3"></div>
    <div class="circle4"></div>
  </div>
	</div>
    
	<div class="black-white-arrow" style="display:none;"><div class="right-triangle" style="position:absolute;right:-32px;top:1px;border-width:16px;border-left-color:#555;"></div><div class="right-triangle" style="position:absolute;right:-30px;top:2px;border-width:15px;border-left-color:#fff;"></div></div>
</div>
    <div class="model">
<div class="inner">
<p>New Blog</p>
<form method="POST" action="process_blog_details.php">
<div class="tag">Title</div><input type="text"  name="blog_title">
<span style="position:relative;"><div class="tag">Address</div><input type="text" name="blog_address" ><span class="domain">.blog.com</span></span>
<div class="template">
<p>Choose your Theme</p>
<div class="template-content">
<div class="theme">
<img src="images/bg1.jpg">
</div>
<div class="theme">
<img src="images/bg1.jpg">
</div>
<div class="theme">
<img src="images/bg1.jpg">
</div>
<div class="clear"></div>
</div>
</div>
<button class="create-blog">Create Blog</button>
<button class="cancel">Cancel</button>
</form>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('div.right-column').width($(window).width()-281);
    $('div.blog-name p').text($('div.left-column ul li a:first').text());
	$('div.posts').load('pro1.php',{"blog_name":$('div.left-column ul li a:first').text()})
	$('div.black-white-arrow').appendTo('div.left-column ul li:first').show();
	$('div.left-column ul li a').click(function(e){
		e.preventDefault();
		$('div.black-white-arrow').hide();
		$('div.black-white-arrow').appendTo($(this).parent()).show();
	});
	$('div.left-column ul li a').click(function(){
		$('div.blog-name p').text($(this).text());
		$('div.posts').empty();
		$('div.spinner').clone().appendTo($('div.posts')).show();
		$('div.posts').load('pro1.php',{"blog_name":$(this).text()});
        
});
    $('#create-blog').click(function(e){
		e.preventDefault();
		$('div.model').fadeIn();
	});
	$('.cancel').click(function(e){
		e.preventDefault();
		$('div.model').fadeOut();
	});
});
$(window).resize(function(){
	$('div.right-column').width($(window).width()-281);
});
</script>
</body>
</html>