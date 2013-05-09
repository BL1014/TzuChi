<?php
//adapted from Lecture 4	
	class Tablet {
		public $tableheader;		// array with header entries
		public $tabledata;		// array of arrays with data
		function displayTable() {
			print("<table border='1'>\n");
			print("<tr>\n");
			foreach ($this->tableheader as $entry) {
				print("<th>$entry</th>\n");
			}
			print("</tr>\n");
			foreach ($this->tabledata as $row) {
				print("<tr>\n");
				foreach ($row as $item) {
					print("<td>$item</td>\n");
				}
				print("</tr>\n");
			}			
			print("</table>\n");
		}
	}
?>