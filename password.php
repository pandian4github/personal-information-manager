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
<title>PIM-Password manager</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">
<script type="text/javascript" src="jquery.js"></script>
<?php
  include('connect.php');
?>
<script type="text/javascript">
function contactchange(str)
{
	var cont;
	cont=document.getElementById('passcontent');
	if(str=='passhome')
	{
		cont.innerHTML="<p><b>What it does ?</b></p><p>Password manager allows you to manage various passwords of an user in various websites. It allows one to store the passwords for different usernames too.</p><p><b>What are the other features ?</b></p><p>Password manager allows one to <ul><li>Add new passwords for new usernames</li><li>Edit existing passwords for usernames</li><li>View all stored passwords</li></ul></p>";
	}
	else
		if(str=='passadd')
		{
			cont.innerHTML="<form class='form-horizontal' id='entryform' method='get' action='addpass.php'><div class='control-group'><label class='control-label' for='website'>Website url : </label><div class='controls'><b>www.</b><input type='text' name='website'/></div></div><div class='control-group'><label class='control-label' for='username'>Username : </label><div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<input type='text' name='username'/></div></div><div class='control-group'><label class='control-label' for='password'>Password : </label><div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<input type='password' name='password'/></div></div><div class='control-group'><div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<button type='submit' class='btn btn-success'>Add password</div></div></form>";
		}
		else
			if(str=='passedit')
			{
				cont.innerHTML="<form class='form-horizontal' id='entryform' method='post' action='?'><div class='control-group'><label class='control-label' for='website'>Website : </label><div class='controls'><b>www.</b><input type='text' name='website'/></div></div><div class='contorl-group'><label class='control-label'>Username : </label><div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<input type='text' name='username'/></div></div><br/><div class='control-group'><div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<button name='editsubmit' type='submit' class='btn btn-success'>Edit</button></div></div></form>";
			}
			else
				if(str=='passview')
				{
				//	cont.innerHTML="<center><ul class='nav nav-pills'><li class='active'><a href='viewcontacts.php' target='_blank'>View all contacts</a></li></ul></center>";
					<?php
					$query="SELECT * FROM `pim`.`passwords` where `uname`='".$_SESSION['username']."'ORDER BY `website` asc;";
					$res1=mysqli_query($dbc,$query);
					$count=1;
					echo "cont.innerHTML=\"";
					echo "<table class='table table-striped'>";
					echo "<thead><tr><th>Sl No.</th><th>Website</th><th>Username</th><th>Password</th></tr></thead>";
					echo "<tbody>";
					while($res=mysqli_fetch_array($res1))
					{
						echo "<tr>";
						echo "<td>{$count}</td>";
						echo "<td>{$res['website']}</td>";
						echo "<td>{$res['username']}</td>";
						echo "<td>{$res['password']}</td>";
						$count=$count+1;
						echo "</tr>";
					}
					echo "</tbody></table>";
					echo "\"";
					?>
				}

}
</script>
</head>
<body>

	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<center><span id="entryhead">Contact Manager</span></center>
		<br/>
		<center>
		<div class="btn-group">
			<button id="passhome" onclick="contactchange('passhome')" class="btn btn-primary">Home</button>
			<button id="passadd" onclick="contactchange('passadd')" class="btn btn-primary">Add password</button>
			<button id="passedit" onclick="contactchange('passedit')" class="btn btn-primary">Edit password</button>
			<button id="passview" onclick="contactchange('passview')" class="btn btn-primary">View all passwords</button>			
		</div>
		</center>
		<br/>
		<div id="passcontent">
			<?php
			if(isset($_POST['editsubmit']))
			{
				$website=$_POST['website'];
				$user=$_POST['username'];
				$query="SELECT * FROM `pim`.`passwords` where `website`='$website' AND `username`='$user' AND `uname`='".$_SESSION['username']."';";
				$res=mysqli_query($dbc,$query);
				$res=mysqli_fetch_array($res);

				echo "<form class='form-horizontal' id='entryform' method='get' action='savepass.php'>
				<input type='hidden' name='oldwebsite' value='{$website}'/>
				<input type='hidden' name='oldusername' value='{$user}'/>
				<div class='control-group'>
					<label class='control-label' for='website'>Website : </label>
					<div class='controls'><b>www.</b><input type='text' name='website' value='{$res['website']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='username'>Username : </label>
					<div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<input type='text' name='username' value='{$res['username']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='password'>Password : </label>
					<div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<input type='password' name='password' value='{$res['password']}'/></div>
				</div>
				<div class='control-group'>
				<div class='controls'>&nbsp &nbsp &nbsp &nbsp &nbsp<button type='submit' class='btn btn-success'>Save changes</div>
				</div>
				</form>";
			}
			else
			{
			echo "
		<p>
			<b>What it does ?</b>
		</p>
		<p>
			Password manager allows you to manage various passwords of an user in various websites. It allows one to store the passwords for different usernames too.
		</p>
		<p>
			<b>What are the other features ?</b>
		</p>
		<p>
			Password manager allows one to 
			<ul>
				<li>Add new passwords for new usernames</li>
				<li>Edit existing passwords for usernames</li>
				<li>View all stored passwords</li>
			</ul>
		</p>";
		}
		?>

		</div>

		<br/>


	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['addpass']))
	{
		if($_SESSION['addpass']==1)
		{	
			echo "<script type='text/javascript'> alert('Password added !'); </script>"; 
			$_SESSION['addpass']=0;
		}	
	}
	if(isset($_SESSION['editpass']))
	{
		if($_SESSION['editpass']==1)
		{	
			echo "<script type='text/javascript'> alert('Password successfully edited !'); </script>"; 
			$_SESSION['editpass']=0;
		}	
	}
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
