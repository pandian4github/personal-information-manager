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
<title>PIM-Contact manager</title>
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
	cont=document.getElementById('contactcontent');
	if(str=='contacthome')
	{
		cont.innerHTML="<p><b>What it does ?</b></p><p>Contact manager allows you to manage various contacts which includes phone number, email id and postal address.</p><p><b>What are the other features ?</b></p><p>Contact manager allows one to <ul><li>Add contacts</li><li>Edit existing contacts</li><li>View all contacts</li></ul></p>";
	}
	else
		if(str=='contactadd')
		{
			cont.innerHTML="<form class='form-horizontal' id='entryform' method='get' action='addcontact.php'><div class='control-group'><label class='control-label' for='name'>Name : </label><div class='controls'><input type='text' name='name'/></div></div><div class='control-group'><label class='control-label' for='phone'>Phone number : </label><div class='controls'><input type='text' name='phone'/></div></div><div class='control-group'><label class='control-label' for='mailid'>Email id : </label><div class='controls'><input type='text' name='mailid'/></div></div><div class='control-group'><label class='control-label' for='address'>Postal address : </label><div class='controls'><textarea name='address'></textarea></div></div><div class='control-group'><label class='control-label' for='city'>City : </label><div class='controls'><input type='text' name='city'/></div></div><div class='control-group'><label class='control-label' for='state'>State : </label><div class='controls'><input type='text' name='state'/></div></div><div class='control-group'><label class='control-label' for='pincode'>Pincode : </label><div class='controls'><input type='text' name='pincode'/></div></div><div class='control-group'><label class='control-label' for='country'>Country : </label><div class='controls'><input type='text' name='country'/></div></div><div class='control-group'><div class='controls'><button type='submit' class='btn btn-success'>Add contact</div></div></form>";
		}
		else
			if(str=='contactedit')
			{
				cont.innerHTML="<form class='form-horizontal' id='entryform' method='post' action='?'><div class='control-group'><label class='control-label' for='phone'>Phone number : </label><div class='controls'><input type='text' name='phone'/></div></div><div class='control-group'><div class='controls'><button name='editsubmit' type='submit' class='btn btn-success'>Edit</div></div></form>";
			}
			else
				if(str=='contactview')
				{
				//	cont.innerHTML="<center><ul class='nav nav-pills'><li class='active'><a href='viewcontacts.php' target='_blank'>View all contacts</a></li></ul></center>";
					<?php
					$query="SELECT * FROM `pim`.`contacts` where `uname`='".$_SESSION['username']."';";
					$res1=mysqli_query($dbc,$query);
					$count=1;
					echo "cont.innerHTML=\"";
					echo "<table class='table table-striped'>";
					echo "<thead><tr><th>Sl No.</th><th>Name</th><th>Phone number</th><th>Email address</th><th>Postal address</th><th>City</th><th>State</th><th>Pincode</th><th>Country</th></tr></thead>";
					echo "<tbody>";
					while($res=mysqli_fetch_array($res1))
					{
						echo "<tr>";
						echo "<td>{$count}</td>";
						echo "<td>{$res['name']}</td>";
						echo "<td>{$res['phone']}</td>";
						echo "<td>{$res['mailid']}</td>";
						echo "<td>{$res['address']}</td>";
						echo "<td>{$res['city']}</td>";
						echo "<td>{$res['state']}</td>";
						echo "<td>{$res['pincode']}</td>";
						echo "<td>{$res['country']}</td>";
						echo "</tr>";
						$count=$count+1;
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
			<button id="contacthome" onclick="contactchange('contacthome')" class="btn btn-primary">Home</button>
			<button id="contactadd" onclick="contactchange('contactadd')" class="btn btn-primary">Add contact</button>
			<button id="contactedit" onclick="contactchange('contactedit')" class="btn btn-primary">Edit contact</button>
			<button id="contactview" onclick="contactchange('contactview')" class="btn btn-primary">View contacts</button>			
		</div>
		</center>
		<br/>
		<div id="contactcontent">
			<?php
			if(isset($_POST['editsubmit']))
			{
				$phone=$_POST['phone'];
				$query="SELECT * FROM `pim`.`contacts` where `phone`='$phone' and `uname`='".$_SESSION['username']."';";
				$res=mysqli_query($dbc,$query);
				$res=mysqli_fetch_array($res);

				echo "<form class='form-horizontal' id='entryform' method='get' action='savecontact.php'>
				<input type='hidden' name='oldphone' value='{$phone}'/>
				<div class='control-group'>
					<label class='control-label' for='name'>Name : </label>
					<div class='controls'><input type='text' name='name' value='{$res['name']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='phone'>Phone number : </label>
					<div class='controls'><input type='text' name='phone' value='{$res['phone']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='mailid'>Email id : </label>
					<div class='controls'><input type='text' name='mailid' value='{$res['mailid']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='address'>Postal address : </label>
					<div class='controls'><textarea name='address'>{$res['address']}</textarea></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='city'>City : </label>
					<div class='controls'><input type='text' name='city' value='{$res['city']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='state'>State : </label>
					<div class='controls'><input type='text' name='state' value='{$res['state']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='pincode'>Pincode : </label>
					<div class='controls'><input type='text' name='pincode' value='{$res['pincode']}'/></div>
				</div>
				<div class='control-group'>
					<label class='control-label' for='country'>Country : </label>
					<div class='controls'><input type='text' name='country' value='{$res['country']}'/></div>
				</div>
				<div class='control-group'>
				<div class='controls'><button type='submit' class='btn btn-success'>Save changes</div>
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
			Contact manager allows you to manage various contacts which includes phone number, email id and postal address.
		</p>
		<p>
			<b>What are the other features ?</b>
		</p>
		<p>
			Contact manager allows one to 
			<ul>
				<li>Add contacts</li>
				<li>Edit existing contacts</li>
				<li>View all contacts</li>
			</ul>
		</p>";
		}
		?>

		</div>

		<br/>


	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['addcontact']))
	{
		if($_SESSION['addcontact']==1)
		{	
			echo "<script type='text/javascript'> alert('Contact added !'); </script>"; 
			$_SESSION['addcontact']=0;
		}	
	}
	if(isset($_SESSION['editcontact']))
	{
		if($_SESSION['editcontact']==1)
		{	
			echo "<script type='text/javascript'> alert('Contact successfully edited !'); </script>"; 
			$_SESSION['editcontact']=0;
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
