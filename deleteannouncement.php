<?php
	$myarray = file("files/announcements.txt");
	$string = $_GET['number'];
	$number = intval($string);
	$number1 = ($number*2)-1;
	$number2 = ($number*2);
	$fp = fopen("files/announcements.txt", "w");
	$index =1;
	foreach ($myarray as $line) {
		if($index==$number1 || $index==$number2) {
			//do nothing
		}
		else {
			fputs($fp, $line);
		}
		$index = $index + 1;
	}
?>