<?php
	include("cleaninput.php");
	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
	
	if(isset($_POST['eventname']) && $_POST['eventname']!= ''
	&& isset($_POST['eventdesc']) && $_POST['eventdesc']!= ''
	&& isset($_POST['eventdate']) && $_POST['eventdate']!= '') {
		$ename= cleanInput($_POST['eventname']);
		$edate= cleanInput($_POST['eventdate']);
		$edesc= cleanInput($_POST['eventdesc']);
		
		$query= "INSERT INTO Events(`eid`, `e_date`, `e_name`, `e_desc`) 
		VALUES('','".$edate."','".$ename."','".$edesc."')";
		$mysqli->query($query);
		
		print("<div id='container0'>Event successfully created.</div>");
	} else {
		print("<div id='container0'>Your form is incomplete. Please fill out everything.</div>");
	}
	$mysqli->close();
?>