<?php
	session_start();
	$date=$_REQUEST['date'];
	$month=$_REQUEST['month'];
	$year=$_REQUEST['year'];
	$user=$_SESSION['username'];

	$contents=$_REQUEST['dcontent'];
	
	//Opening file
	$filename="diary/".$user."_".$date."_".$month."_".$year.".txt";
	$file=fopen($filename,"w+");

	//Writing to file
	fwrite($file,$contents);
	fclose($file);
	$_SESSION['adddiary']=1;
	header("location:diary.php");

?>