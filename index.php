<?php 
session_start(); 
if(!isset($_SESSION['loggedin']))
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Personal Information Manager</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">

<script type="text/javascript">
</script>

</head>

<body>

	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<center><span id="entryhead">About Personal-Information-Manager</span></center>
		<p>
			<b>What is PIM ?</b>
		</p>
		<p>
			PIM is the Personal Information Manager which allows an user to manage his personal information. This gives one a common platform to incorporate various needs of a person.
		</p>
		<p>
			<b>What PIM includes ?</b>
		</p>
		<p>
			Some of the options that PIM includes are 
			<ul>
				<li>Personal diary</li>
				<li>Contact manager</li>
				<li>Password manager</li>
				<li>Important dates</li>
			</ul>
		</p>
		<p>
			<b>Features</b>
		</p>
		<p>
			Some of the main features of PIM are : 
			<ul>
				<li>The details of an user are stored online so that the user can access his/her information at anytime and anywhere.</li>
				<li>The details are highly encrypted and password protected so the user need not worry about security threats.</li>
			</ul>
		</p>
		<br/>


	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['passchanged']))
		if($_SESSION['passchanged']==1)
		{
			echo "<script type='text/javascript'> alert('Password changed !'); </script>";
			$_SESSION['passchanged']=0;
		}
	if(isset($_SESSION['updatesuccess']))
		if($_SESSION['updatesuccess']==1)
		{
			echo "<script type='text/javascript'> alert('Updated successfully !'); </script>";
			$_SESSION['updatesuccess']=0;
		}
	if(isset($_SESSION['entrysuccess']))
		if($_SESSION['entrysuccess']==1)
		{
			echo "<script type='text/javascript'> alert('Entry successful'); </script>";
			$_SESSION['entrysuccess']=0;
		}
			$_SESSION['entryerror']=0;
				
		?>
</body>
</html>
