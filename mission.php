<?php
	session_start();
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Mission | Cornell Tzu Chi</title>
    </head>



	<body>
		<div id="wrapper">
		
		<div id="header">
		<div id="menuBar">
		<a href="index.php"> <img id="logo" src="images/logo.png" alt="Tzu Chi Logo" width="130" height="80"/> </a>
		
		<div id="nav_container">
			<div class="rectangle">
				<ul id="nav">
					<li class="current" id="about">
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
					<li id="contact">
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
		
		<div id="about_mission">
			<a id="mission"></a>
				<h1>MISSION</h1>
				<p>Content</p>
		</div>
		
		
		
		</div>
		
		</div>
		
		<?php
			require("inc/footer.php");
		?>
	</body>
</html>