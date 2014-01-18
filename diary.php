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
<title>PIM-Personal diary</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">
<script type="text/javascript" src="jquery.js"></script>
<?php
  include('connect.php');
?>
<script language="javascript" type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
theme : "advanced",
mode: "exact",
elements : "elm1",
theme_advanced_toolbar_location : "top",
theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
+ "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
+ "bullist,numlist,outdent,indent",
theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
+"undo,redo,cleanup,code,separator,sub,sup,charmap",
theme_advanced_buttons3 : "",
height:"350px",
width:"600px"
});
</script>

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Skin options
    skin : "o2k7",
    skin_variant : "silver",

    // Example content CSS (should be your site CSS)
    content_css : "css/example.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "js/template_list.js",
    external_link_list_url : "js/link_list.js",
    external_image_list_url : "js/image_list.js",
    media_external_list_url : "js/media_list.js",

    // Replace values for the template plugin
    template_replace_values : {
            username : "Some User",
            staffid : "991234"
    }
});
</script>

<script type="text/javascript">
function diarychange(str)
{
	var cont;
	cont=document.getElementById('diarycontent');
	if(str=='diaryhome')
	{
		cont.innerHTML="<p><b>What it does ?</b></p><p>Personal diary allows you to write your own personal diary daily and manage it or view it later.</p><p><b>What are the other features ?</b></p><p>Personal diary allows one to <ul><li>Add a diary note</li><li>View diary entry for a particular day</li></ul></p>";
	}
}
</script>
</head>
<body>

	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<center><span id="entryhead">Personal diary</span></center>
		<br/>
		<center>
		<div class="btn-group">
			<form method='post' action='?'>
			<button id="diaryhome" onclick="diarychange('diaryhome')" class="btn btn-primary">Home</button>
			<button type='submit' name='diaryadd' id="diaryadd" class="btn btn-primary">Add diary</button>
			<button type='submit' name='diaryview' id="diaryview" class="btn btn-primary">View diary</button>			
			</form>
		</div>
		</center>
		<br/>
		<div id="diarycontent">
			<?php
			if(isset($_POST['diaryadd']))
			{
				echo "<form class='form-horizontal' id='specialform' method='get' action='adddiary.php'><div class='control-group'><label class='control-label' for='date'>Date : </label><div class='controls'><select id='date' name='date' class='span2'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select></div></div><div class='control-group'><label class='control-label' for='month'>Month : </label><div class='controls'><select id='month' name='month' class='span3'><option value='January'>Januray</option><option value='February'>February</option><option value='March'>March</option><option value='April'>April</option><option value='May'>May</option><option value='June'>June</option><option value='July'>July</option><option value='August'>August</option><option value='September'>September</option><option value='October'>October</option><option value='November'>November</option><option value='December'>December</option></select></div></div><div class='control-group'><label class='control-label'>Year : </label><div class='controls'><select name='year' class='span3'><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select></div></div><div class='control-group'><label class='control-label' for='dcontent'>Your diary : </label><div class='controls'><textarea id='textarea' name='dcontent'></textarea></div></div><div class='control-group'><div class='controls'><button type='submit' class='btn btn-success'>Submit</button></div></div></form>";
			}
			else
				if(isset($_POST['diaryview']))
				{
					echo "<form class='form-horizontal' id='entryform' method='post' action='?'><div class='control-group'><label class='control-label' for='date'>Date : </label><div class='controls'><select id='date' name='date' class='span2'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option></select></div></div><div class='control-group'><label class='control-label' for='month'>Month : </label><div class='controls'><select id='month' name='month' class='span3'><option value='January'>Januray</option><option value='February'>February</option><option value='March'>March</option><option value='April'>April</option><option value='May'>May</option><option value='June'>June</option><option value='July'>July</option><option value='August'>August</option><option value='September'>September</option><option value='October'>October</option><option value='November'>November</option><option value='December'>December</option></select></div></div><div class='control-group'><label class='control-label'>Year : </label><div class='controls'><select name='year' class='span3'><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option><option value='2020'>2020</option></select></div></div><div class='control-group'><div class='controls'><button type='submit' id='editsubmit' name='editsubmit' class='btn btn-success'>Submit</button></div></div></form>";
				}
				else
					if(isset($_POST['editsubmit']))
					{
						$date=$_POST['date'];
						$month=$_POST['month'];
						$year=$_POST['year'];

						$user=$_SESSION['username'];
				
						//Opening file
						$filename="diary/".$user."_".$date."_".$month."_".$year.".txt";

						echo "<center>Diary entry for : <b>".$date." ".$month." ".$year."</b></center><br/>";
						echo "<center><textarea name='dcontent'>";
						if(file_exists($filename))
						{
							$file=file($filename);
							foreach($file as $text)
							{
								echo $text;
							}
						}
						echo "</textarea></center>";
					}
					else
					{
					echo "
					<p>
						<b>What it does ?</b>
					</p>
					<p>
						Personal diary allows you to write your own personal diary daily and manage it or view it later.
					</p>
					<p>
						<b>What are the other features ?</b>
					</p>
					<p>
						Personal diary allows one to 
						<ul>
							<li>Add a diary note</li>
							<li>View diary entry for a particular day</li>
						</ul>
					</p>";
					}
		?>

		</div>

		<br/>


	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['adddiary']))
	{
		if($_SESSION['adddiary']==1)
		{	
			echo "<script type='text/javascript'> alert('Diary added !'); </script>"; 
			$_SESSION['adddiary']=0;
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
