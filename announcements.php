<?php
	session_start();
	require("inc/doctype.php");
	require("tablet.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="announcements.js"></script>
        <title>Admin | Cornell Tzu Chi</title>
    </head>


	<body>
		<div id="wrapper">
		
		<div id="header">
		<div id="menuBar">
		<a href="index.php"> <img id="logo" src="images/logo.png" alt="Tzu Chi Logo" width="130" height="80"/> </a>
		
		<div id="nav_container">
			<div class="rectangle">
				<ul id="nav">
					<li id="about">
						About
							<ul>
								<li><a href="mission.php">MISSION</a></li>
								<li><a href="eboard.php">EXECUTIVE BOARD</a></li>
								<li><a href="3in1.php">3 IN 1</a></li>
								<li><a href="constitution.php">CONSTITUTION</a></li>
								<li><a href="meetings.php">MEETINGS</a></li>
							</ul>
					</li>
					<li id="events">
						Events
							<ul>
								<li><a href="calendar.php">CALENDAR</a></li>
								<li><a href="upcoming.php">UPCOMING EVENTS</a></li>
								<li><a href="past.php">PAST EVENTS AND PHOTOS</a></li>
							</ul>
					</li>
					<li id="resources">
						Resources
							<ul>
								<li><a href="chapter.php">OTHER CHAPTERS</a></li>
								<li><a href="http://www.tzuchi.org">GLOBAL TZU CHI</a></li>
								<li><a href="http://www.daai.tv/2011web/main/">DA AI TV</a></li>
							</ul>
					</li>
					<li class="current" id="contact">
						<a href="contact.php">Contact Us</a>
					</li>
					<li id="admin">
						Admin
							<ul>
								<li>
									<?php
										if(!isset($_SESSION['user'])){ print("<a href=\"admin.php\" class=\"links\">LOGIN</a>");}
										else{ print("<a href=\"admin.php\" class=\"links\">LOGOUT</a>");}
									?>
								</li>
								<li><a href="minutes.php">EBOARD MINUTES</a></li>
								<li><a href="announcements.php">ANNOUNCEMENTS</a></li>
								<li><a href="photos.php">EVENTS AND PHOTOS</a></li>
								<li><a href="aphorisms.php">APHORISMS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
			
			<div id="container1">
			
			<h1>Announcements</h1>
			
			<?php
				//the user has logged in
				if(isset($_SESSION['user'])){
					//THIS PART HAS YET TO BE IMPLEMENTED
					$atable = new Tablet();
					$atable->tableheader = array("Title", "Announcement", "Delete");
					$myarray = file("files/announcements.txt");
					$mainarray = array();
					$tracker=1;
					while(count($myarray)>1){
						$temparray = array();
						$temparray[]= $myarray[0];
						$temparray[]= $myarray[1];
						$temparray[]= "<input type=\"button\" name=\"a".$tracker."\" value=\"Delete\"/>";
						$current = count($myarray);
						$myarray = array_slice($myarray, 2, $current - 2);
						$mainarray[]=$temparray;
						$tracker = $tracker + 1;
					}
					$atable->tabledata=$mainarray;
					$atable->displayTable();
				}
				//the user has not logged in
				else{
					print("<p>You haven't logged in yet. Please log in at <a href=\"admin.php\">this page</a></p>");
				}

			?>
			
			</div>
			
			<div id="container2">
			
			<h1>Add New</h1>
			
			<form action="newannouncement.php" method="get" >
				<label>Title:</label>
				<input type="text" name="title" id="title" /><br /><br />
				<label>Announcement:</label><br />
				<textarea name="announcement" id="announcement" rows="10" cols="50"></textarea><br /><br />
				<input type="button" value="Add This Announcement" id="addButton" name="addButton" /> 
			</form> 
			
			</div>
			
		</div>
		
		</div>
		
		</div>
		
		
		<?php
			require("inc/footer.php");
		?>
	</body>
</html>