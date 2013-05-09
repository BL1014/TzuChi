<?php
	session_start();
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Tzu Ching | Tzu Chi Collegiate Chapter at Cornell</title>
    </head>


	<body>
		<div id="wrapper">
		
		<div id="header">
		<div id="menuBar">
		<a href="index.php"> <img id="logo" src="images/logo.png" alt="Tzu Chu Logo" width="130" height="80"/> </a>
		
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
								<li><a href="past.php">PAST EVENTS</a></li>
								<li><a href="media.php">MEDIA</a></li>
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
								<li><a href="photos.php">PHOTOS</a></li>
								<li><a href="aphorisms.php">APHORISMS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
		
		<img id="banner" src="images/banner_temp.jpg" alt="temp banner" height="432" width="1500"/>
			
		<h1>WELCOME</h1>
		<p>
			"Tzu Chi" stands for "Compassionate Relief". We are an international humanitarian organization and one of the largest NGOs in Asia. Tzu Chi was founded in Taiwan in 1966 by Master Cheng Yen, a Buddhist nun. This organization began with Master Cheng Yen and thirty housewives that put aside a bit of grocery money everyday to donate to the needy. Tzu Chi has four core missions: Charity, Medicine, Education and Culture.
			<br/><br/>
			The Tzu Chi (TC) chapter here at Cornell mainly focuses on Charity, Culture, and Education. We tutor children from Ithaca Chinese School, volunteer at a nursing home right here in Ithaca, and help raise money to aid disaster relief. In addition to volunteering, we are a social group on campus that holds fun bonding events. Past events include movie night, Chinese New Year's celebration, Chimes tour, and home cooked vegetarian dinners by the E-board! Please sign-up on our listserv to find out more about us.
		</p>
		
		<h1>Announcements</h1>
		
		<?php
			//get all of the announcements and print them 
			$myarray = file("files/announcements.txt");
			$index = 1;
			foreach ($myarray as $line) {
				if ($index % 2 == 0) {
					//use paragraph tags because it is the announcement content
					print("<p>".$line."</p>");
				}
				else {
					//use header tags because it is the title of the announcement
					print("<h2>".$line."</h2>");
				}
				$index =$index +1;
			}
		?>
		
		</div>
		
		</div>
		
		
		<?php
			require("inc/footer.php");
		?>
		
	</body>
</html>