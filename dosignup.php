<?php
	session_start();
	include('connect.php');

	$user=$_REQUEST['username'];
	$pass=$_REQUEST['password'];
	$mailid=$_REQUEST['mailid'];
	$name=$_REQUEST['name'];

	$query="INSERT INTO `pim`.`users`(`username`,`password`,`mailid`,`name`) values('$user','$pass','$mailid','$name');";
	$res=mysqli_query($dbc,$query);

	$_SESSION['signup']=1;
	header('location:login.php');

?>