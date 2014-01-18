<div class="row-fluid" id="toprow">
	<div class="span2"></div>
	<div class="span8"><center><b>PERSONAL INFORMATION MANAGER</b></center></div>
	<div class="span2"></div>
</div>
	<br/>
<div class="row-fluid">
	<div class="span2 offset2" id="changepass"><br/>	
	<?php
	if(isset($_SESSION['loggedin']))
		echo "<a href='changepass.php'>Change password</a>";
	?>
	</div>
	<div class="span4" id="main-head"><center><h2> P I M app </h2><center> </div>
	<div class="span1 offset1" id="logout"><br/>	
	<?php
	if(isset($_SESSION['loggedin']))
			echo "<a href='logout.php'>Logout</a>";
	?>
	</div>
</div>


<div class="row-fluid">
	<div class="span2" id="leftsidebar">	
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php">Home</a></li><hr>
			<li><a href="diary.php">Personal diary</a></li><hr>
			<li><a href="contact.php">Contact manager</a></li><hr>
			<li><a href="password.php">Password manager</a></li><hr>
			<li><a href="impdates.php">Important dates</a></li>
		</ul>
	</div>

