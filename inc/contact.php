<?php
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Mission | Tzu Ching</title>
    </head>


	<body>
		<div id="wrapper">
		
		<div id="header">
		<div id="menuBar">
		<a href="index.php"> <img id="logo" src="images/logo.png" alt="Tzu Chi Logo" width="125" height="65"/> </a>
		
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
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
		
			<!--Here is the Contact Form-->
			<h1>Contact Us</h1>
			
			<p>Fill out the following form to submit a suggestion. Feel free to submit all of your thoughts, we appreciate
			any feedback that you may have!<br /><br />If you would like to be added to the listserve, just include that 
			in your message.</p><br /><br />
						
			<form action="contact.php" method="post">
			<p>Name (required):<input type="text" name="name"/><br />
			   Primary Email (required):<input type=\"text\" name=\"caption\"/><br />
			   Phone Number (Optional): <input type=\"text\" name=\"datetaken\"/><br />
			   Reason for Contact:
					<select id="reason" name="reason">
						<option value="Suggestion">Suggestion</option>
						<option value="Listserve">Listserve</option>
						<option value="Other">Other</option>
					</select><br /><br />
			   <input type="submit" name="submit" value="Send your message"/>
			</p>
			</form>
						
			<!--Here is the PHP for the contact form-->
			<?php
			
			?>
		</div>
		
		
		
		</div>
		
		</div>
	</body>
</html>