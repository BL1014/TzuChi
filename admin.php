<?php
	//Sessions
	session_start();
	
	//check to see if the user has logged in
	if(isset($_POST['submit']) && htmlentities($_POST['username'])=="administrator" && htmlentities($_POST['password']=="password")){
		$_SESSION['user']="administrator";
	}
	
	//change the logout status of the user
	if(!isset($_POST['submit']) && isset($_SESSION['user'])){
		unset($_SESSION['user']);
		$_SESSION['logout']="yes";
	}
	
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
					<li id="contact">
						<a href="contact.php">Contact Us</a>
					</li>
					<li class="current" id="admin">
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
								<li><a href="photos.php">APHORISMS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
	
			<h1>Administrator Panel</h1>
			
			<!--Here is the login portion of the administrator panel-->
			<?php
			//the user has logged in
					if(isset($_SESSION['user'])){
						if(isset($_POST['submit'])) {
							print("<p>Thank you for logging in. You can now access the other functionalities under the \"Admin\" tab.</p>");
						}
					} 
					//the user has not logged in
					else {
						if(isset($_POST['submit'])){
							print("<p>Your username and/or password is incorrect, please try again.</p>");
						} 
						else {
							if(isset($_SESSION['logout'])){
								print("<p>Thank you for logging out. Feel free to log back in below.</p>");
								unset($_SESSION['logout']);
							}
							else{print("<p>Please enter your username and password to login and access the administrator functionalities of this site.</p>");}
						}
						//print the form since the user has not logged in
						print("<form action=\"admin.php\" method=\"post\">");
							print("<p>Username:<input type=\"text\" name=\"username\"/><br/>");
							print("Password:<input type=\"text\" name=\"password\"/><br/>");
							print("<input name=\"submit\" type=\"submit\" value=\"Submit\"/><br/></p>");
						print("</form>");
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