<?php
	session_start();
	include('connect.php');
	$website=$_GET['website'];
	$user=$_GET['username'];
	$pass=$_GET['password'];
	$query="INSERT INTO `pim`.`passwords`(`uname`,`website`,`username`,`password`) values('".$_SESSION['username']."','$website','$user','$pass');";
	$res=mysqli_query($dbc,$query);
	$_SESSION['addpass']=1;
	header("location:password.php");
?>