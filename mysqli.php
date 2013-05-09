<?php
	$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
	
	function getAph() {	// displays a random Aphorism, assumes no "gaps" in aphid; that is, row number = aphid
		$max= $mysqli->query("SELECT COUNT(*) FROM Aphorisms");
		$aphid= int rand(1, $max);
		$aph= $mysqli->query("SELECT aph_content FROM Aphorisms WHERE aphid=$aphid"); 
		print("<p>".$aph."</p>");
	}
?>