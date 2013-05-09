
	/* Creates a dropdown list of all the albums. 
	YOU MUST ALREADY HAVE THE SELECT TAG MADE, SO YOU CAN SPECIFY THE TAG NAME! */

	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
	
	$result= $mysqli->query("SELECT * FROM Albums");
	while($array= $result->fetch_assoc()) {
		print("<option value='".$array['a_name']."'>".$array['a_name']."</option>");
	}
	
	$myqli->close();
