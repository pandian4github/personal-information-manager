<?php
	session_start();
	include('connect.php');
	$oldphone=$_GET['oldphone'];
	$name=$_GET['name'];
	$phone=$_GET['phone'];
	$mailid=$_GET['mailid'];
	$address=$_GET['address'];
	$city=$_GET['city'];
	$state=$_GET['state'];
	$pincode=$_GET['pincode'];
	$country=$_GET['country'];
	$query="DELETE FROM `pim`.`contacts` where `phone`='$oldphone';";
	$res=mysqli_query($dbc,$query);
	$query="INSERT INTO `pim`.`contacts`(`uname`,`name`,`phone`,`mailid`,`address`,`city`,`state`,`pincode`,`country`) values('".$_SESSION['username']."','$name','$phone','$mailid','$address','$city','$state','$pincode','$country');";
	$res=mysqli_query($dbc,$query);
	$_SESSION['editcontact']=1;
	header("location:contact.php");
?>