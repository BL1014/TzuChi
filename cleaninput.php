<?php // clean up user input
	function cleanInput($input) {           
		$input= mysql_real_escape_string($input);
		$input= htmlentities($input);
		return $input;
	}
?>