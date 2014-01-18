<?php
	session_start();
	include('connect.php');

	$user=$_REQUEST['username'];
	$pass=$_REQUEST['password'];
	//echo "<script>alert('$password');</script>";

	$query="SELECT * from `pim`.`users` where `username`='$user' and `password`='$pass';";
	$res=mysqli_query($dbc,$query);
	$count=mysqli_num_rows($res);
	//echo "<script>alert('$count');</script>";
	if($count==1)
	{
		$_SESSION['loggedin']=1;
		$_SESSION['username']=$user;
		header("location:index.php");
	}
	else
	{
		$_SESSION['wrongpass']=1;
		header("location:login.php");
	}	
?>
