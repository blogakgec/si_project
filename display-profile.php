<html>
<head>
<link rel="stylesheet" type="text/css" href="css/display-profile.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
<body>

<div class="wrapper">
	<div class="top">
	<p>Blogger</p>
	</div>
	<div class="left-column">
	<div class="image">
	<img src="images/bg1.jpg">
	</div>
	<div class="details">
	<table>
	<tr>
		<td>Name</td>
		<td>Vishal Chaurasiya</td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td>vishalchaurasiya02@gmail.com</td>
	</tr>
	<tr>
		<td>Work</td>
		<td>Software Developer</td>
	</tr>
	</tr>
		<td>Education</td>
		<td>Ajay Kumar Garg Engineering</td>
	</tr>
	<tr>
		<td>Date of Birthday</td>
		<td>19/09/1995</td>
	</tr>
	</table>
	</div>
	</div>
	<div class="right-column">
		<div>
		<p>Vishal Chaurasiya's Blogs</p>
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