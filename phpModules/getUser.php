<?php 
	session_start();
	$conn=mysqli_connect("localhost","root","");
	if(!$conn){
		die(mysqli_error($conn));
	}
	$value=$_SESSION['value'];
	$result=mysqli_select_db($conn,"smartfood");
	$conn->set_charset('utf8');
	$result=mysqli_query($conn,"call getUser_id('$value');");
	$check=mysqli_fetch_array($result);
	$user_id=$check['user_id'];
?>