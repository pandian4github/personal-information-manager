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
<title>PIM-Important dates</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">
<script type="text/javascript" src="jquery.js"></script>
<?php
  include('connect.php');
?>
<script type="text/javascript">
function dateschange(str)
{
	var cont;
	cont=document.getElementById('datescontent');
	if(str=='dateshome')
	{
		cont.innerHTML="<p><b>What it does ?</b></p><p>Dates manager allows you to manage important dates and store important occasions in those dates and view them when required.</p><p><b>What are the other features ?</b></p><p>Dates manager allows one to <ul><li>Add a new date</li><li>View a particular date</li><li>View all stored occasions</li></ul></p>";
	}
	else
		if(str=='datesadd')
		{
			cont.innerHTML="<form class='form-horizontal' id='entryform' method='get' action='adddate.php'><div class='control-group'><label class='control-label' for='date'>Date : </label><div class='controls'><select id='date' name='date' class='span2'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select></div></div><div class='control-group'><label class='control-label' for='month'>Month : </label><div class='controls'><select id='month' name='month' class='span3'><option value='January'>Januray</option><option value='February'>February</option><option value='March'>March</option><option value='April'>April</option><option value='May'>May</option><option value='June'>June</option><option value='July'>July</option><option value='August'>August</option><option value='September'>September</option><option value='October'>October</option><option value='November'>November</option><option value='December'>December</option></select></div></div><div class='control-group'><label class='control-label' for='occasion'>Occasion : </label><div class='controls'><textarea name='occasion'></textarea></div></div><div class='control-group'><div class='controls'><button type='submit' class='btn btn-success'>Submit</button></div></div></form>";
		}
		else
			if(str=='datesview')
			{
				cont.innerHTML="<form class='form-horizontal' id='entryform' method='get' action='?'><div class='control-group'><label class='control-label' for='date'>Date : </label><div class='controls'><select id='date' name='date' class='span2'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select></div></div><div class='control-group'><label class='control-label' for='month'>Month : </label><div class='controls'><select id='month' name='month' class='span3'><option value='January'>Januray</option><option value='February'>February</option><option value='March'>March</option><option value='April'>April</option><option value='May'>May</option><option value='June'>June</option><option value='July'>July</option><option value='August'>August</option><option value='September'>September</option><option value='October'>October</option><option value='November'>November</option><option value='December'>December</option></select></div></div><div class='control-group'><div class='controls'><button type='submit' id='editsubmit' name='editsubmit' class='btn btn-success'>Submit</button></div></div></form>";
			}
			else
				if(str=='datesviewall')
				{
				//	cont.innerHTML="<center><ul class='nav nav-pills'><li class='active'><a href='viewcontacts.php' target='_blank'>View all contacts</a></li></ul></center>";
					<?php
					$query="SELECT * FROM `pim`.`dates` where `uname`='".$_SESSION['username']."';";
					$res1=mysqli_query($dbc,$query);
					$count=1;
					echo "cont.innerHTML=\"";
					echo "<table class='table table-striped'>";
					echo "<thead><tr><th>Sl No.</th><th>Date</th><th>Month</th><th>Occasion</th></tr></thead>";
					echo "<tbody>";
					while($res=mysqli_fetch_array($res1))
					{
						echo "<tr>";
						echo "<td>{$count}</td>";
						echo "<td>{$res['date']}</td>";
						echo "<td>{$res['month']}</td>";
						echo "<td>{$res['occasion']}</td>";
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
		<center><span id="entryhead">Important dates</span></center>
		<br/>
		<center>
		<div class="btn-group">
			<button id="dateshome" onclick="dateschange('dateshome')" class="btn btn-primary">Home</button>
			<button id="datesadd" onclick="dateschange('datesadd')" class="btn btn-primary">Add date</button>
			<button id="datesview" onclick="dateschange('datesview')" class="btn btn-primary">View a date</button>
			<button id="datesviewall" onclick="dateschange('datesviewall')" class="btn btn-primary">View all dates</button>			
		</div>
		</center>
		<br/>
		<div id="datescontent">
			<?php
			if(isset($_REQUEST['editsubmit']))
			{
				$date=$_REQUEST['date'];
				$month=$_REQUEST['month'];
				$query="SELECT * FROM `pim`.`dates` where `date`='$date' and `month`='$month' and `uname`='".$_SESSION['username']."';";
				$res=mysqli_query($dbc,$query);
				$res=mysqli_fetch_array($res);

				echo "<center>";
				echo "<b>Date</b> : $date<br/>";
				echo "<b>Month</b> : $month<br/>";
				echo "</center>";
				echo "<form class='form-horizontal' id='entryform' method='GET' action='savedate.php'>
				<input type='hidden' name='olddate' value='{$date}'/>
				<input type='hidden' name='oldmonth' value='{$month}'/>

				<div class='control-group'>
					<label class='control-label' for='occasion'>Occasion : </label>
					<div class='controls'><textarea name='occasion'>{$res['occasion']}</textarea></div>
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
			Dates manager allows you to manage important dates and store important occasions in those dates and view them when required.
		</p>
		<p>
			<b>What are the other features ?</b>
		</p>
		<p>
			Dates manager allows one to 
			<ul>
				<li>Add a date</li>
				<li>View a particular date</li>
				<li>View all stored occasions</li>
			</ul>
		</p>";
		}
		?>

		</div>

		<br/>


	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['adddate']))
	{
		if($_SESSION['adddate']==1)
		{	
			echo "<script type='text/javascript'> alert('Occasion added !'); </script>"; 
			$_SESSION['adddate']=0;
		}	
	}				
	if(isset($_SESSION['editdate']))
	{
		if($_SESSION['editdate']==1)
		{	
			echo "<script type='text/javascript'> alert('Occasion edited !'); </script>"; 
			$_SESSION['editdate']=0;
		}	
	}				
	?>
</body>
</html>
