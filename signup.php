<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Personal Information Manager</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="signup.css">

<script type="text/javascript">
</script>
</head>

<body>

	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>

	<form class="form-horizontal"  method="post" action="dosignup.php" id="loginform">
		<div class="control-group">
			<label for="name" class="control-label">Enter your name : </label>
			<div class="controls">
				<input type="text" name="name"/>
			</div>
		</div>
		<div class="control-group">
			<label for="username" class="control-label">Choose an username : </label>
			<div class="controls">
				<input type="text" name="username"/>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label">Choose a password : </label>
			<div class="controls">
				<input type="password" name="password"/>
			</div>
		</div>
		<div class="control-group">
			<label for="mailid" class="control-label">Enter your mail-id : </label>
			<div class="controls">
				<input type="text" name="mailid"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success">Signup</button>
				<a href='login.php' class='btn btn-danger'>Login</a>
			</div>
		</div>
	</form>

	</div><br/>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	
	?>
</body>
</html>
