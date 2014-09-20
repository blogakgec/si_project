<html>
<head>
<link rel="stylesheet" type="text/css" href="css/display-profile.css">
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
            $query="SELECT * FROM profile WHERE user_id={$row['user_id']} ";
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
		<a href="#" id="create-blog">Create New Blog</a>
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
		<div>
		<p>Security Loop Holes.</p>
		<a href="#" id="view-blog">View Blog</a>
		<acronym title="create new post"><span class="glyphicon glyphicon-pencil"></span></acronym>
		<div class="clear"></div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('div.right-column').width($(window).width()-520);
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