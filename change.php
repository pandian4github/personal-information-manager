<?php
	session_start();
	
	include('connect.php');

	$_SESSION['oldpasswrong']=0;
	$_SESSION['passchanged']=0;
	
	$pass=$_POST['password'];
	$newpass=$_POST['newpass'];

	$query="SELECT * from `pim`.`users` where `username`='".$_SESSION['username']."' and `password`='$pass';";
	$res=mysqli_query($dbc,$query);
	$count=mysqli_num_rows($res);

	if($count==1)
	{
		$query1="UPDATE `pim`.`users` SET `password`='$newpass' where `username`='".$_SESSION['username']."' and `password`='$pass';";
		$res1=mysqli_query($dbc,$query1);

		$_SESSION['passchanged']=1;
		header("location:index.php");
	}
	else
	{
		$_SESSION['oldpasswrong']=1;
		header("location:changepass.php");
	}
	
?>