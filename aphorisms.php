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
	
			<h1>Aphorisms</h1>
			
			<?php
				//the user has logged in
				if(isset($_SESSION['user'])){
					//the user has submitted a new aphorism
					if(isset($_POST['submit'])){
						if(htmlentities($_POST['aphorism'])!=""){
							//ADD APHORISM TO DATABASE
							print("<p>You have successfully added an aphorism to the database. Feel free to add another one.</p>");
						}
						else{
							print("<p>You left the aphorism field blank. Please try again.<p>");
						}
					}
					//the user has not submitted a new aphorism yet
					else {
						print("<p>Use the following form to submit a new aphorism to the database.</p>");
					}
					//include form to add aphorism as long as the user has logged in
					print("<form action=\"aphorisms.php\" method=\"post\">");
							print("<p>");
								print("Aphorism:<input type=\"text\" name=\"aphorism\"/><br />");
								print("<input type=\"submit\" name=\"submit\" value=\"Submit New Aphorism\"/>");
							print("</p>");
					print("</form>");
				}
				//the user has not logged in
				else{
					print("<p>You haven't logged in yet. Please log in at <a href=\"admin.php\">this page</a></p>");
					
					print("<form enctype='multipart/form-data' action='upload.php' id='upform' name='upform' method='POST'>
					Choose a photo (gif, jpeg/jpg, or png under 5MB) to upload:<br/>
					<input type='file' name='photo' id='photo'/><br/>
					Please enter caption:<br/>
					<textarea name='ucaption' maxlength='255' rows='5' cols='40' wrap='virtual' form='upform'></textarea><br/>
					Select an album:<select name='album'>");
					include("albumdropdown.php");
					print("<option value='1'>test</option>");
					print("</select><br/>
					<input type='submit' name='upload' value='Upload Photo' />
					</form>
					<br/>");
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