<?php
	session_start();
	$date=$_REQUEST['olddate'];
	$month=$_REQUEST['oldmonth'];
	$occasion=$_REQUEST['occasion'];
	$user=$_SESSION['username'];

	include('connect.php');
	$query="DELETE FROM `pim`.`dates` where `date`='$date' and `month`='$month' and `uname`='$user';";
	$res=mysqli_query($dbc,$query) or die('Error in deleting');
	$query="INSERT INTO `pim`.`dates`(`uname`,`date`,`month`,`occasion`) values('$user','$date','$month','$occasion');";
	$res=mysqli_query($dbc,$query) or die('Error in inserting');

	$_SESSION['editdate']=1;
	header("location:impdates.php");

?>