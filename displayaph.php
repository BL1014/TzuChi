<?php
	function getAph() {	// displays a random Aphorism, assumes no "gaps" in aphid; that is, row number = aphid
		$mysqli= new mysqli('', 'Renas_fangirls', 'wh83rq01vpu', 'info230_SP13FP_Renas_fangirls');
		$count= $mysqli->query("SELECT COUNT(*) FROM Aphorisms");
		$countArray= $count->fetch_row();
		$max= $countArray[0];
		$aphid= rand(1, $max);
		$aph= $mysqli->query("SELECT aph_content FROM Aphorisms WHERE aphid=$aphid"); 
		printAph($aph);
		$mysqli->close();
	}
					
	function printAph($result) {
		$array = $result->fetch_assoc();
		print("<p>".$array['aph_content']."</p>");
	}

	getAph();
?>