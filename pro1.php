<?php
    session_start();
    $blog_name=$_REQUEST['blog_name'];  
    require_once('includes/connection.php');
    $email=$_SESSION['email'];
    $user_id =" SELECT * FROM accounts WHERE email='{$email}' ";
    $user_id_result= mysqli_query($con,$user_id);
    $user_id_row= mysqli_fetch_array($user_id_result,MYSQLI_ASSOC);

//    $test="SELECT * 
//          FROM blogs
//            WHERE blog_name='".$blog_name."' AND user_id='{$user_id_row['user_id_row']}'";

        $test= "SELECT * 
                FROM blogs 
                WHERE blog_name='{$blog_name}' AND user_id='{$user_id_row['user_id']}' ";
        $test_result= mysqli_query($con,$test);
        $test_row= mysqli_fetch_array($test_result,MYSQLI_ASSOC);
// $row=mysql_fetch_array(mysql_query("SELECT blog_id FROM blogs WHERE blog_name='".$blog_name."' AND user_id='{$user_id_row['user_id_row']}'"));
        $query=" SELECT *
                 FROM posts
                 WHERE user_id='{$user_id_row['user_id']}' AND blog_id='{$test_row['blog_id']}' ";
        $query_result= mysqli_query($con,$query);
//$query=mysql_query("SELECT * FROM posts WHERE user_id='{$user_id_row['user_id']}' AND blog_id='".$row[0]."'");
echo '	<a href="#" style="width:150px;margin-left:20px;">View Blog</a>
			<a href="#" style="width:150px;">Create New Post</a>
			<div class="clear"></div>';
	while($rows=mysqli_fetch_array($query_result,MYSQLI_ASSOC))
    {
		echo '<div class="article">
			<p>'.$rows['post_title'].'</p>
			<div class="content">
			<div class="right-triangle" style="transform:rotate(270deg);position:absolute;top:-32px;left:50px;border-width:16px;border-left-color:#555;"></div><div class="right-triangle" style="transform:rotate(270deg);position:absolute;top:-30px;left:51px;border-width:15px;border-left-color:#fff;"></div>
			<div class="post-date"><p>26</p><p>November</p><p>2014</p></div>
			<a href="create_post.php?user_id=7&post_id='.$rows['post_id'].'<?" id="edit-posts"><i class="fa fa-pencil"></i></a>
			<p>Posted on 26, Wednesday, November,2014</p>
			<img src="images/bg1.jpg" class="post-image">
			<span style="margin:10px;"><p style="color:#555;">'.$rows['post_content'].'</p></span>
			<div class="clear"></div>
		</div>
		</div>
<!--Post division ends here-->';
}
echo '<div class="navigation">
			<a href="#"><i class="fa fa-angle-double-left"></i>&nbspNewer Post</a>
			<a href="#">Previous Post&nbsp<i class="fa fa-angle-double-right"></i></a>
		</div>';
?>