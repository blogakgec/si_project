<?php
    include 'includes/connection.php';
    $user_id = $_GET['id'];
    echo $user_id;
    $query = "SELECT * FROM profile WHERE user_id= '{$user_id}' ";
    $query_result= mysqli_query($con,$query);
    $query_row= mysqli_fetch_array($query_result,MYSQLI_ASSOC);





?>




<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="css/theme2.css">
<script type = "text/javascript" src = "js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
    
    
    
    
    
<body>
    
    
    
<div class="wrapper">
	<div class="header">
	<p><?php echo $query_row['full_name'];
             ?></p>
	</div>
	<div class="menu">
	<ul>
		<li><a href="display1.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
		<li><a href="#footer"><span class="glyphicon glyphicon-envelope"></span>Contact</a></li>
		<li><a href="#"><span class="glyphicon glyphicon-user"></span>About</a></li>
	</ul>
		<div class="search">
		<form>
			<input type="text" placeholder="Search here">
			<button><span class="glyphicon glyphicon-search"></span></button>
		</form>
		</div>
		<div class="clear"></div>
	</div>
    
    <?php
    $public= "SELECT * FROM posts WHERE user_id={$row['user_id']} AND blog_id={$blog_id} ";
//    $public= 'SELECT * FROM posts WHERE user_id="'.$row['user_id'].'"AND blog_id="'.$blog_id.'"';
    $public_query = mysqli_query($con,$public);
   while($public_next = mysqli_fetch_array($public_query,MYSQLI_ASSOC))
   {
      echo  $public_next['post_title'];
   }
?>
       <div class="content">
		<div class="left-column">
			<div class="posts">
			<p>Cyber Security</p>
			<div class="post-date">
				<p>Posted on friday, April 26, 2014</p>	
				<a href="#"><span class="glyphicon glyphicon-comment"></span>Comments</a>
				<div class="clear"></div>
			</div>
			<div class="post-content">
				<div class="image">
				<image src="images/bg1.jpg">
				</div>
				<div class="details"><p>
				Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic...</p>
				</div>
				<a class="read" href="#">Read More</a>
			</div>
			<div class="clear"></div>
		</div>
		
			<div class="navigation">
			<a href="#"><span class="glyphicon glyphicon-arrow-left"></span></a>
			<a href="#"><span class="glyphicon glyphicon-arrow-right"></span></a>
		</div>
		<div class="clear"></div>
		</div>
		<div class="right-column">
			<div class="subscribe">
			<p>Subscribe</p>
			<form>
				<input type="text" placeholder="Email Address...">
				<input type="submit">
			</form>
			</div>
			<div class="popular">
				<p>Popular Posts</p>
				<div>
				<img src="images/bg1.jpg">
				<div class="hint"><a href="#">Lorem Ipsum is simply dummy text of the printing</a></div>
				<div class="clear"></div>
				</div>
			</div>
			<div class="popular">
				<p>Recent Posts</p>
				<div>
				<img src="images/bg1.jpg">
				<div class="hint"><a href="#">Lorem Ipsum is simply dummy text of the printing</a></div>
				<div class="clear"></div>
				</div>
				<div>
				<img src="images/bg1.jpg">
				<div class="hint"><a href="#">Lorem Ipsum is simply dummy text of the printing</a></div>
				<div class="clear"></div>
				</div>
				<div>
				<img src="images/bg1.jpg">
				<div class="hint"><a href="#">Lorem Ipsum is simply dummy text of the printing</a></div>
				<div class="clear"></div>
				</div>
				<div class="contact-form">
					<p>Contact me</p>
					<form>
					<input type="text" name="name"placeholder="Enter your Name">
					<input type="text" name="email" placeholder="Enter your Email Address">
					<textarea name="message" placeholder="Enter your Message">
					</textarea>
					<input type="submit" value="Send">
					</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="footer">
	<p>Copyright &copy 2014 site.com. All Rights Reserved.</p>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var $menu=$('div.menu').clone();
		$menu.css({'margin-top':0,'margin-bottom':0});
	$(window).scroll(function(){
	if($(window).scrollTop()>=$('div.menu').offset().top){
		if($('div.menu').length==1){
		$top=$('<div class="top"></div>');
		$top.appendTo(document.body);
	}
	$($menu).appendTo($top);
	}
	else{
		if($('div.top').length!=0)
		$($top).remove();
	}
});
});
</script>
</body>
</html>