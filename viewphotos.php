<?php
	if(isset($_POST['submitEvent'])) {
		$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
		$eid= $_POST['event'];
		$query= "SELECT * FROM Events NATURAL JOIN ofEvent NATURAL JOIN Photos WHERE ofEvent.eid=$eid";
		$result= $mysqli->query($query);
		$query2= "SELECT * FROM Events WHERE eid=$eid";
		$result2= $mysqli->query($query2);
		$array= $result2->fetch_assoc();
		print("<h2>".$array['e_name'].":</h2>".$array['e_desc']."<br/><br/>
		Photos are shown: <br/>");
		printPhotos($result);
	}
	
	function printPhotos($result) {
		if ($result && $result->num_rows > 0) {
			while($array= $result->fetch_assoc() ) {
				print("<div id='image'>
				<img src='".$array['url']."' alt='".$array['pid']."'/>
				<p>Caption: ".$array['p_desc']."</p></div>");
			}
		}
	}
?>