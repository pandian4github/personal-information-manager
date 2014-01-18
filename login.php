<?php
session_start(); 
?>
<html>
<head>
<title>PIM Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="login.css">
<script type="text/javascript">
</script>
</head>
<body>
	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>

	<form class="form-horizontal"  method="post" action="checklogin.php" id="loginform">
		<div class="control-group">
			<label for="username" class="control-label">Enter username : </label>
			<div class="controls">
				<input type="text" name="username"/>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label">Enter password : </label>
			<div class="controls">
				<input type="password" name="password"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success">Login</button>
				<a href='signup.php' class='btn btn-danger'>Signup</a>
			</div>
		</div>

	</form>
	</div><br/>
	<?php include('sitelayout2.php'); include('footer.php');  ?>
	<?php
		if(isset($_SESSION['signup']))
		{
			if($_SESSION['signup']==1)
				echo "<script type='text/javascript'>alert('Thanks for signing up. You can now login and use your account.');</script>";
			$_SESSION['signup']=0;
		}
		if(isset($_SESSION['wrongpass']))
		{
			if($_SESSION['wrongpass']==1)
				echo "<script type='text/javascript'>alert('Wrong username or password.');</script>";
			$_SESSION['wrongpass']=0;
		}
	?>
	</body>
</html>
