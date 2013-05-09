<?php
	session_start();
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
								<li><a href="photos.php">PHOTOS AND EVENTS</a></li>
								<li><a href="aphorisms.php">APHORISMS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
	
			<h1>Eboard Minutes</h1>
			
			<?php
				//the user has logged in
				if(isset($_SESSION['user'])){
					//the user submitted meeting minutes
					if(isset($_POST['submit'])){
						//the form inputs are complete
						if(htmlentities($_POST['date'])!="" && htmlentities($_POST['message'])!="" && 
						preg_match("/^([12][0-9][0-9][0-9]-[01][0-9]-[0-3][0-9])$/", htmlentities($_POST['date']))){
							print("<p>You have successfully submitted your Eboard Meeting Minutes. Feel free to submit more minutes if needed.</p>");
							//open file and write meeting minutes on it
							$fp = fopen("files/minutes.txt", "a");
							$string = "Minutes for: ".htmlentities($_POST['date'])."\n\n";
							fputs($fp, $string);
							$string2 = htmlentities($_POST['message']);
							$moresentences = true;
							while ($moresentences) {
								$position = strpos($string2, ".");
								if(!$position){
									$moresentences=false;
								}
								else {
									$tempstring = substr($string2, 0, $position+1);
									fputs($fp, $tempstring."\n");
									$string2 = substr($string2, $position+2);
								}
							}
							fputs($fp, "\n\n");
						}
						//the form inputs are incomplete or in an incorrect format
						else {
							print("<p>You have left a field blank or the date that you have entered is in an invalid format. Please try again.</p>");
						}
					}
					//the user has not submitted meeting minutes
					else {
						print("<p>Use the following form to submit Eboard meeting minutes.</p>");
					}
					//include form to submit meeting minutes as long as the user has logged in
					print("<form action=\"minutes.php\" method=\"post\">");
							print("<p>");
								print("Date (YYYY-MM-DD):<input type=\"text\" name=\"date\"/><br />");
								print("Minutes: <textarea name=\"message\" rows=\"10\" cols=\"50\"></textarea><br /><br />");
								print("<input type=\"submit\" name=\"submit\" value=\"Submit Minutes\"/>");
							print("</p>");
					print("</form>");
				}
				//the user has not logged in
				else{
					print("<p>You haven't logged in yet. Please log in at <a href=\"admin.php\">this page</a></p>");
				}

			?>
			
			
		</div>
		
		
		
		</div>
		
		</div>
		
		<?php
			require("inc/footer.php");
		?>
	</body>
</html>