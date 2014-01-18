<?php
	session_start();
	include('connect.php');
	$oldwebsite=$_REQUEST['oldwebsite'];
	$olduser=$_REQUEST['oldusername'];
	$website=$_REQUEST['website'];
	$user=$_REQUEST['username'];
	$pass=$_REQUEST['password'];
	$query="DELETE FROM `pim`.`passwords` where `website`='$oldwebsite' AND `username`='$olduser';";
	$res=mysqli_query($dbc,$query);
	$query="INSERT INTO `pim`.`passwords`(`uname`,`website`,`username`,`password`) values('".$_SESSION['username']."','$website','$user','$pass');";
	$res=mysqli_query($dbc,$query);
	$_SESSION['editpass']=1;
	header("location:password.php");
?>