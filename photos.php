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
	
		<h1>Photo and Event Management</h1>
			
			<?php	
				//the user has logged in
				if(isset($_SESSION['user'])){
					//the user has submitted a new photo
					if(isset($_POST['submitPhoto'])){
						//CHECK TO SEE THAT FORM INPUTS ARE CORRECT
						//ADD PHOTO TO DATABASE
						include("uploadphoto.php");
					}
					if(isset($_POST['createEvent'])){
						include("createevent.php");
					}
				
					//include form to upload a photo as long as the user has logged in
					//IMPLEMENT CORRECT FORM
					
						print("<p>");
							print("<h2>Use the following form to upload a new photo.</h2>");
							print("<form action='photos.php' method=\"post\" enctype=\"multipart/form-data\" id='photoform' name='photoform'>");
							print("Photo (required):<input type=\"file\" name=\"photo\" id=\"photo\"/><br />
							(gif, jpeg/jpg, or png under 5MB)<br/>");
							print("Caption (optional):<br/><textarea name='caption' maxlength='255' rows='5' cols='40' wrap='virtual' form='photoform'></textarea><br/>");
							print("Event (required):<select name='event'>");
							$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
							$result= $mysqli->query("SELECT * FROM Events");
							while($array= $result->fetch_assoc()) {
								print("<option value='".$array['eid']."'>".$array['e_name']."</option>");
							}
							print("</select><br />
							<input type=\"submit\" name=\"submitPhoto\" value=\"Upload Photo\"/>
							</form>");
							
							print("<h2>Use the following form to create a new event.</h2>");
							//eid, e_date, e_name, e_desc
							print("<form action='photos.php' method='post' name='eventform' id='eventform'>");
							print("Name (required):<input type='text' name='eventname'><br/>");
							print("Date (required):<input type='date' name='eventdate'><br/>");
							print("Description (required):<br/><textarea name='eventdesc' maxlength='1024' rows='5' cols='40' wrap='virtual' form='eventform'></textarea><br/>");
							print("<input type='submit' name='createEvent' value='Create Event'/>
							</form>");
							
							$mysqli->close();
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