<?php
            session_start();
            if(isset($_SESSION['email'])) {
            header("Location:view-blog.php");
            }
                     
         ?>
<!doctype html>
<html>
<head>
<title>BLogger</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<link rel = "stylesheet" type="text/css" href = "css/blogger-style.css">
<link rel="stylesheet" type="text/css" href="css/login2.css">
<link rel="icon" type="image/png" href="images/icon.png">
<script type = "text/javascript" src = "js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/form_validate_ja.js"></script>
<script>
function aval(str)
{
var xmlhttp;
if (str.length==0)
  { 
  document.getElementById("isaval").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("isaval").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","aval.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type = "text/javascript">
var $toPosition=0;
var currPos;
$(document).ready(function(){
	$('div.log-in').load('http://localhost/blog/si_project/login2%20.php',function(){
		$('div.login').click(function(e){
		e.preventDefault();
		console.log($('div.log-in'));
		$('div.page1').fadeOut();
		$('div.page2').fadeOut();
		$('div.log-in').fadeIn();
	});
	$('div.close').click(function(){
		$('div.page1').fadeIn();
		$('div.page2').fadeIn();
		$('div.log-in').fadeOut();
	});
	});	
	width=$(window).width()>960?$(window).width():960;
	height=$(window).height()>600?$(window).height():600;
	console.log(width);
	$('div.wrapper').width(width);
	$('div.wrapper').height(height);
	$('div.page1 img').width(width);
	$('div.page1 img').height(height);
	$('div.page1').width(width);
	$('div.page1').height(height);
	$('div.page2').width(width);
	$('div.page2').height(height);
	$('div.icons div').click(function(){
		var box=$(this);
		var prev=$('div.active');
		$('div.'+prev.data('box')).fadeOut(function(){
		$('div.'+box.data('box')).fadeIn();
		prev.removeClass('active');
		box.addClass('active');
		});
});
	currPos=$('div.icons div:first');
	$toElement=$('div.page1');
	$('div.slide div').css('margin-left',currPos.offset().left-25);
	$('div.icons div').click(function(){
		$this=$(this);
		currPos=$this;
		$('div.slide div').animate({marginLeft:currPos.offset().left-25},500);
	});
	animate();
	$('a').click(function(e){
	if(this.hash){
		e.preventDefault();
		hash=this.hash.substr(1);
		$toElement=$('div.'+hash);
		$toPosition = $toElement.position().top+$('div.wrapper').scrollTop();
		$('div.wrapper').animate({scrollTop:$toPosition},300,'linear',function(){
			if($toElement.is($('div.page1'))){
				$('.menu a').css('color','rgba(255,255,255,.8)');
			}
			else{
			$('.menu a').css('color','rgba(0,0,0,.8)');
		}
		});
	}
});
});
function resize(){
	width=$(window).width()>960?$(window).width():960;
	height=$(window).height()>600?$(window).height():600;
	$('div.wrapper').width(width);
	$('div.wrapper').height(height);
	$('div.page1 img').width(width);
	$('div.page1 img').height(height);
	$('div.page1').width(width);
	$('div.page1').height(height);
	$('div.page2').width(width);
	$('div.page2').height(height);
	$('div.slide div').css('margin-left',currPos.offset().left-25);
	$toPosition = $toElement.position().top+$('div.wrapper').scrollTop();
		$('div.wrapper').scrollTop($toPosition);
}
$(window).resize(function(){
	resize();
});
function animate(){
	var $active=$(" img.active");
	var $next=($active.next("img").length>0)?$active.next():$(".page1 img:first");
	$next.addClass("active").fadeIn(2000);
	$active.removeClass("active").fadeOut(3000);
	setTimeout(animate,5000);
}
</script>
</head>
<body>
<div class = "wrapper">
	<div class = "page1" >
	<img src="images/bg1.jpg" class="active">
	<img src="images/bg2.jpg">
	<img src="images/bg3.jpg">
	<img src="images/bg4.jpg">
	<div class="top">
	<div class = "menu">
	<a href="#">Menu</a>
	</div>
	<div class="logo">
	<p>Blogger</p>
	</div>
	<div class="login">
	<a href="#">Login</a>
	</div>
	</div>
	<div class ="idea">
	<p>Your Idea needs a great Website</p>
	<p>It's surprisingly easy to create a unique website,blog.</p>
	</div>
	<div id = "sign-up">
	<div id = "sign-up-form">
	<div id = "sign-up-ribbon">
	<div id ="left-triangle">
	</div>
	<p>Sign Up Free</p>
	<div id ="right-triangle">
	</div>
	</div>
	<form name = "myform" onsubmit="return(validate());" method="post" action="process.php">
	<input type="text" name="name" placeholder="User Name" style="" id="check" onkeyup="aval(this.value)"><span id="isaval"></span>
	<input type="text" name="email" placeholder="Email" style="background:white;">
	<input type="password" name="pword" placeholder="Password" style="background:white;">
        <div id="errortext"><br><br></div>
	<input type="submit">
	</form>
	</div>
	</div>
	<a href="#page2"><div class="next"><span class="glyphicon glyphicon-chevron-down"></span></div></a>
	</div>
	<div class = "page2">
	<div class="wrapper2">
	<a href="#page1" class="sign-up2">Sign Up</a>
	<div class="features">
	<p>Salient Features</p>
	</div>
	<div class="icons">
	<div data-box="theme" class="active">
	<p>Themes</p>
	</div>
	<div data-box="drag-drop">
	<p>Drag & Drop</p>
	</div>
	<div data-box="blogging">
	<p>Blogging</p>
	</div>
	</div>
	<div class="slide">
	<div></div>
	</div>
	<div class="wrapper3">
	<div class="theme">
	<div class="theme-select">
	<p>Select Your Theme</p>
	<div></div>
	<div></div>
	<div></div>
	<a href="#" class="clear">More Themes</a>
	</div>
	</div>
	<div class="drag-drop">
	<div class="content">
	<div>
	<h2>Salient Drag & Drop Creator</h2>
	<p>Our handy drag & drop creator allows you to bring your ideas to life in minutes.Design for web directly from your browser, give a look the way you want with full control that fits any skill level. </p>
	</div>
	<div></div>
	</div>
	<div class="clear"></div>
	</div>
	<div class="blogging">
	<div class="content">
	<div>
	<h2>Easy to create Blogs</h2>
	<p>Grow your community and share your blog with the world. Our blogging tools bring your content to life and support your unique voice. Start a blog today, your audience is waiting.. </p>
	</div>
	<div></div>
	</div>
	<div class="clear"></div>
	</div>
	</div>
	</div>
	<div class="prev-page">
	<a href="#page1"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
</div>
<div class="log-in" style="display:none;">
<div class="wrap">
<div class="header">
<p>Blogger</p>
</div>
<div class="close"><span class="glyphicon glyphicon-remove"></span></div>
<div>
	<div class="left-column">
	<a href="#">Log In</a>
	<a href="#">Log In</a>
	</div>
	<div class="right-column">
	<form>
	<div class="mail">
    <span class="glyphicon glyphicon-envelope"></span>
	<input type="text" placeholder="Email">
	</div>
	<div class="pword">
    <span class="glyphicon glyphicon-lock"></span>
	<input type="password" placeholder="Password">
	</div>
	<input type="submit" value="Log In">
	</form>
	</div>
	<div class="clear"></div>
</div>
</div>
</div>
</div>
<div class="log-in" style="display:none;position:relative;">
</div>
</body>
</html>
<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->
