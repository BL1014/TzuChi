<?php
	/* Creates a dropdown list of all the events. 
	YOU MUST ALREADY HAVE THE SELECT TAG MADE, SO YOU CAN SPECIFY THE TAG NAME! */
	eventDropdown() {	
		$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
		
		$result= $mysqli->query("SELECT * FROM Events");
		while($array= $result->fetch_assoc()) {
			print("<option value='".$array['e_name']."'>".$array['e_name']."</option>");
		}
		$mysqli->close();
	}
?>