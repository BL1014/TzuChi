<?php
	include("cleaninput.php");
	$allowed   = array("gif", "jpeg", "jpg", "png");
	$extension = end(explode(".", $_FILES['photo']['name']));
	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
	if(isset($_FILES['photo']) && isset($_POST['event']) && $_POST['event']!='') {
		if ((($_FILES['photo']['type'] == "image/gif") || 
			($_FILES['photo']['type'] == "image/jpeg") || 
			($_FILES['photo']['type'] == "image/jpg") || 
			($_FILES['photo']['type'] == "image/png")) && 
			($_FILES['photo']['size'] < 5000000) && 
			in_array($extension, $allowed)) {

			if ($_FILES['photo']["error"] > 0) {
				print("Error: " . $_FILES['photo']['error'] . "<br>");
			} else {
				$name= basename($_FILES['photo']['name']);
				$eid= $_POST['event'];

				if (file_exists("photos/" . $name)) {
					print("photos/" . $name . " already exists.");
				} else {
					$path= "photos/";
					$path= $path.$name;
					if (move_uploaded_file($_FILES['photo']['tmp_name'], $path)) {
						print("The photo " .$name. " has been uploaded successfully.<br/>");
						$caption= cleanInput($_POST['caption']);
						$query1= "INSERT INTO Photos(`pid`, `p_desc`, `url`) VALUES('', '".$caption."', '".$path."')";
						$mysqli->query($query1);
						$query2= "SELECT pid FROM Photos WHERE URL='".$path."';";
						$result= $mysqli->query($query2);
						$array= $result->fetch_assoc();
						$pid = reset($array);
						$query3= "INSERT INTO ofEvent(`eid`, `pid`) VALUES('".$eid."', '".$pid."');";
						$mysqli->query($query3);
					} else { print("There was an error uploading the file, please try again.");
					}
				}
			}
		} else {
			print("Invalid filetype or filesize. Please try again with a different photo.");
		}
	} else {
		print("Your form is incomplete. Please choose a photo and event.");
	}
	
	$mysqli->close();
?>