<?php
	session_start();
	require("inc/doctype.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="styles/main.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="photos.js"></script>
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
								<li><a href="new.php">NEW EVENTS/PHOTOS</a></li>
								<li><a href="edit.php">EDIT EVENTS/PHOTOS</a></li>
							</ul>
					</li>
				</ul>
			</div>       
		</div>
		</div>
		</div>
		
		<div id="container">
	
			<div id="container0">
			<h1>Event/Photo Edit</h1>
			<a href="edit.php"> <button> Choose Another Event to Edit </button> </a>
			</div>
			
			
			<?php
				if(isset($_POST['event'])|| isset($_GET['event'])) {
					
					$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
					if(isset($_POST['event'])){$eid= $_POST['event'];}
					else{$eid=$_GET['event'];}
					$query= "SELECT * FROM Events NATURAL JOIN ofEvent NATURAL JOIN Photos WHERE ofEvent.eid=$eid";
					$result= $mysqli->query($query);
					$query2= "SELECT * FROM Events WHERE eid=$eid";
					$result2= $mysqli->query($query2);
					$array= $result2->fetch_assoc();
					
					print("<div id='container1'>");
					print("<h2>Edit Event Information</h2>");
					print("<p id='ename'>".$array['e_name'].":</p>");
					print("<form>");
						print("<input type='text' name='eventname' id='eventname'/>");
						print("<input type='button' value='Change Event Name' name='button1' id='button1'/>");
					print("</form>");
					
					print("<p>".$array['e_desc']."</p>");
					print("<form>");
						print("<textarea name='eventdescription' id='eventdescription' rows='10' cols='40'></textarea><br />");
						print("<input type='button' value='Change Event Description' name='button2' id='button2'/>");
					print("</form>");
					print("</div>");
					
					print("<div id='container2'>");
					print("<h2>Edit Photos<br/></h2>");
					printPhotos($result);
					print("</div>");
				}
				
				function printPhotos($result) {
					if ($result && $result->num_rows > 0) {
						while($array= $result->fetch_assoc() ) {
							print("<div id='image'>
							<img src='".$array['url']."' alt='".$array['pid']."'/>
							<p>Caption: ".$array['p_desc']."</p>
							<input type=\"button\" name=\"".$array['pid']."\" value=\"Delete From Event Album\"/></div>");
						}
					}
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




