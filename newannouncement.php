<?php
	$myarray = file("files/announcements.txt");
	$title = $_GET['title']."\n";
	$announcement = $_GET['announcement']."\n";
	$fp = fopen("files/announcements.txt", "w");
	fputs($fp, $title);
	fputs($fp, $announcement);
	foreach ($myarray as $line) {
		fputs($fp, $line);
	}
?>