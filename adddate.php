<?php
	session_start();
	include('connect.php');
	$date=$_REQUEST['date'];
	$month=$_REQUEST['month'];
	$occasion=$_REQUEST['occasion'];
	$user=$_SESSION['username'];

	$query="INSERT INTO `pim`.`dates`(`uname`,`date`,`month`,`occasion`) values('$user','$date','$month','$occasion');";
	//echo $query;
	$res=mysqli_query($dbc,$query) or die('Error in query');

	$_SESSION['adddate']=1;
	header("location:impdates.php");
?>
