<?php
	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
	$oldid = $_GET['oldid'];
	$newname = $_GET['newname'];
	$query= "UPDATE Events SET e_name='$newname' WHERE eid='$oldid'";
	$result= $mysqli->query($query);
?>
