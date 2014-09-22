<?php
$con= new mysqli ("localhost","root","","blog");
$name = $_REQUEST["q"];
if(!$name=="")
{
	$statement = $con->prepare("SELECT `user_id` FROM `accounts` WHERE `username` = ?");
	$statement->bind_param('s', $name);
	$statement->execute();
	$statement->bind_result($returned_name);
		if($statement->fetch())
			{echo "<br>Not Available<br>" ;}
		else
			{echo "<br>Available<br>" ;}
}
$con->close();
    
?>