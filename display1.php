<html>
<head>
<link rel="stylesheet" type="text/css" href="css/display-profile.css">
<link rel="stylesheet" type="text/css" href="css/new-blog.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
    <?php
            session_start();
            if(!isset($_SESSION['email'])) {
            header("Location:login2%20.php");
            }

                     
         ?>
<body>
<div class="wrapper">
	<div class="top">
	<p>Blogger</p>
	</div>
	<div class="left-column">
	<div class="image">
	<img src="images/bg1.jpg">
	</div>
        <?php 
                
            include 'includes/connection.php';
            $email= $_SESSION['email'];
            $subquery="SELECT user_id FROM accounts WHERE email='{$email}' LIMIT 1 ";
        
            $result=mysqli_query($con,$subquery);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            echo $row['user_id'];

            $query="SELECT * FROM profile WHERE user_id={$row['user_id']} LIMIT 1 ";
            $result_next=mysqli_query($con,$query);
            $row_next=mysqli_fetch_array($result_next,MYSQLI_ASSOC);
        ?>
        
	<p>Profile</p>
	<table>
	<tr>
		<td>Name</td>
		<td><?php echo $row_next['full_name']; ?> </td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><?php echo $_SESSION['email']; ?></td>
	</tr>
	<tr>
		<td>Work</td>
		<td><?php echo $row_next['work']; ?></td>
	</tr>
	</tr>
		<td>Education</td>
		<td><?php echo $row_next['education']; ?></td>
	</tr>
	<tr>
		<td>Date of Birthday</td>
		<td><?php echo $row_next['dob']; ?></td>
	</tr>
	</table>
	<a href="#">Update Profile</a>
	</div>
	<div class="right-column">
		<div>
		<p><?php echo $row_next['full_name']; ?>'s Blogs</p>
		<a href="create_post.php" id="create-blog">Create New Blog</a>
		<div class="clear"></div>
		</div>
		<div>
		<p>All Blogs</p>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>

        
        
        <?php
                $ask="SELECT blog_name FROM blogs WHERE user_id='{$row_next['user_id']}' ";
                $ask_result=mysqli_query($con,$ask);
                $ask_row= mysqli_fetch_array($ask_result,MYSQLI_ASSOC);
                    
        ?>
                


        
        
        
        
		<div>
		<p><?php echo $ask_row['blog_name']; ?></p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
	</div>
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
	$('div.right-column').width($(window).width()-520);
    $('#create-blog').click(function(e){
		e.preventDefault();
		$('div.model').fadeIn();
	});
	$('.cancel').click(function(e){
		e.preventDefault();
		$('div.model').fadeOut();
	});
});
function resize(){
	var $this=$('div.right-column');
	if($(window).width()>1200){
		$this.width($(window).width()-520);
	}
}
$(window).resize(function(){
	resize();
});
</script>
</body>
</html>