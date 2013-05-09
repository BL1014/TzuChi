<?php
	$allowed   = array("gif", "jpeg", "jpg", "png");
	$extension = end(explode(".", $_FILES['photo']['name']));
	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
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
			$eventq= "SELECT * FROM Events WHERE eid=$_POST['event']";
			$event= $mysqli->query($event);
			$earray= $event->fetch_assoc();
			$eid= $earray['eid'];
			$ename= $earray['e_name'];
			if (file_exists("Photos/" .$ename. "/" . $name)) {
				print("Photos/" .$ename. "/" . $name. " already exists.");
			} else {
				$path= "Photos/";
				$path= $path.$ename."/".$name;
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
					$query4= "UPDATE Albums SET DateM= CURRENT_TIMESTAMP WHERE aid=$aid";
					$mysqli->query($query4);
				} else { print("There was an error uploading the file, please try again.");
				}
			}
		}
	} else {
		print("Invalid filetype or filesize. Please try again with a different photo.");
	}
	$mysqli->close();
?>