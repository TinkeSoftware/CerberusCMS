<?php
/*
 ===========================================================================================
 + Cerberus Content Management System.
 + ---
 + - Author : Gary Christopher Johnson
 + - E-Mail : TinkeSoftware@Protonmail.com // GCJohnsonChevalier@Protonmail.com
 + - Company: Tinke Software
 + - Notes  : View this file in a non-formatting text editor for correct indentation display
 + ---
 +
 +
 +
 +
 +
 +
 +
 +
 +
 +
 +
 + ---
 + - File Location: root->System->Configuration->Class_Database.php
 + - File Version:  0.4 - Sunday, September, 08, 2019.
 + ---
 +%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
 +%%%()()%%()()()%%()()()%%()()()%%()()()%%()()()%%()%%()%%%%%%()()()%%%%%%%%%%%%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%%%%%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%%%%%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%%%%%
 +%%()%%%%%()()()%%()()()%%()()()%%()()()%%()()()%%()%%()%%%%%%()%%%%%%%%%%%%%%%%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%%%%%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%/-\%
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%|4|%  ~ Wyn ~
 +%%%()()%%()()()%%()%%()%%()()()%%()()()%%()%%()%%()()()%%()()()%%%%%%%%%%%%\-/% Build 0.6
 ===========================================================================================
*/

/*
 ===========================
 +
 +
 + Database Class and Functions
 +
 +
 ===========================
*/

class DB {
	function connect($_QUERY) {
		$_QUERY = mysql_connect($_QUERY) or die(mysql_error());
			return $_QUERY;
} // [ + ] $DB->connect

	function connect_db($_QUERY) {
		$_QUERY = mysql_select_db($_QUERY) or die(mysql_error());
			return $_QUERY;
} // [ + ] $DB->connect_db

	function query($_QUERY) {
		$_QUERY = mysql_query($_QUERY);
			return $_QUERY;
} // [ + ] $DB->query

	function fetch_array($_QUERY) {
		 $_QUERY = mysql_fetch_array($_QUERY);
			return $_QUERY;
} // [ + ] $DB->fetch_array

	function fetch_row($_QUERY) {
		$_QUERY = mysql_fetch_row($_QUERY);
			return $_QUERY;
} // [ + ] $DB->fetch_row

	function num_rows($_QUERY) {
		$_QUERY = mysql_num_rows($_QUERY);
			return $_QUERY;
} // [ + ] $DB->num_rows

	function close($_QUERY) {
		$_QUERY = mysql_close($_QUERY);
			return $_QUERY;
} // [ + ] $DB->close

	function free($_QUERY) {
		$_QUERY = mysql_free_result($_QUERY);
			return $_QUERY;
} // [ + ] $DB->free

} // [ + ] Class DB
?>