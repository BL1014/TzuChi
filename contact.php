<?php
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Contact | Cornell Tzu Chi</title>
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
								<li><a href="photos.php">PHOTOS</a></li>
								<li><a href="photos.php">APHORISMS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
	
			<h1>Contact Us</h1>
			
			<!--Here is the PHP for the contact form-->
			<?php
				//user has not submitted form yet
				if(!isset($_POST['submit'])){
					print("<p>Fill out the following form to submit a suggestion. Feel free to submit all of your thoughts, we appreciate
					any feedback that you may have!<br /><br />If you would like to be added to the listserve, just include that 
					in your message.</p>");
				}
				//there are blanks for required fields
				elseif(htmlentities($_POST['name'])=="" || htmlentities($_POST['email'])=="" || htmlentities($_POST['message'])==""){
					print("<p>You have left one or more of the required fields empty. Please try again.</p>");
				}
				//there are formatting errors (comprehensiveness to be determined)
				elseif(!htmlentities($_POST['phone'])=="" && !preg_match("/^([1-9][0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9][0-9])$/", htmlentities($_POST['phone']))){
					print("<p>The phone number you have included is not in a valid XXX-XXX-XXXX format. Please try again.</p>");
				}
				//no blank fields, no formatting errors
				else {
					print("<p>You have successfully submitted your message to Cornell Tzu Chi. We will get back to you as soon as possible. Feel free to submit
					another message</p>");
					//send email to Tzu Chi inbox 
					$to = "cornelltzuching@gmail.com";
				    $subject = htmlentities($_POST['reason'])." from ".htmlentities($_POST['name'])."(".htmlentities($POST['email']).")";
				    $message = "".htmlentities($_POST['message']);
				    mail($to,$subject,$message);
				}
			?>
			
				
			<!--Here is the Contact Form-->
			<form action="contact.php" method="post">
			<p>Name (required):<input type="text" name="name"/><br />
			   Primary Email (required):<input type="text" name="email"/><br />
			   Phone Number XXX-XXX-XXXX(Optional): <input type="text" name="phone"/><br />
			   Reason for Contact:
					<select id="reason" name="reason">
						<option value="Suggestion">Suggestion</option>
						<option value="Listserve">Listserve</option>
						<option value="Other">Other</option>
					</select><br /><br />
				Message (required):<br />
				<textarea name="message" rows="4" cols="50"></textarea><br /><br /> 
			    <input type="submit" name="submit" value="Send your message"/>
			</p>
			</form>
						
			
		</div>
		
		
		
		</div>
		
		</div>
		
		<?php
			require("inc/footer.php");
		?>
	</body>
</html>