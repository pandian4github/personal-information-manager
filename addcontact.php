<?php
	session_start();
	include('connect.php');
	$name=$_GET['name'];
	$phone=$_GET['phone'];
	$mailid=$_GET['mailid'];
	$address=$_GET['address'];
	$city=$_GET['city'];
	$state=$_GET['state'];
	$pincode=$_GET['pincode'];
	$country=$_GET['country'];
	$query="INSERT INTO `pim`.`contacts`(`uname`,`name`,`phone`,`mailid`,`address`,`city`,`state`,`pincode`,`country`) values('".$_SESSION['username']."','$name','$phone','$mailid','$address','$city','$state','$pincode','$country');";
	echo $query;
	$res=mysqli_query($dbc,$query) or die("Error in query");
	$_SESSION['addcontact']=1;
	header("location:contact.php");
?>