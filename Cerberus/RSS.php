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
 + - File Location: root->RSS.php
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
 + ERROR HANDLING
 +
 +
 ===========================
*/

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ===========================
 +
 +
 + Include Configuration File
 +
 +
 ===========================
*/

$_MAIN_CONFIGURATION_FILE				= "System/Configuration/Main_Configuration.php";

if (file_exists($_MAIN_CONFIGURATION_FILE)) {
	include_once "$_MAIN_CONFIGURATION_FILE";

/*
 ===========================
 +
 +
 + Initialize Database Class
 +
 +
 ===========================
*/

$DB							= new DB();

/*
 ===========================
 +
 +
 + Connect To Database Server
 +
 +
 ===========================
*/

$_MAIN_DATABASE_CONNECTION				= mysql_connect("$_ACCESS_DATABASE_HOSTNAME","$_ACCESS_DATABASE_USERNAME","$_ACCESS_DATABASE_PASSWORD");

/*
 ===========================
 +
 +
 + Connect To Database
 +
 +
 ===========================
*/

$_MAIN_DATABASE_SELECTION				= mysql_select_db("$_ACCESS_DATABASE_NAME") or die(mysql_error());

/*
 ===========================
 +
 +
 + RSS Generator
 +
 +
 ===========================
*/

header("Content-Type: text/xml;charset=iso-8859-1");

echo ("<?xml version=\"1.0\" encoding=\"ISO-8859-1\" ?>

<rss version=\"2.0\">
	<channel>
		<title>RSS -> News Generator</title>
		<link>$_ACCESS_URL_CLEAR</link>
		<description>News Feeds</description>
		<language>en-en</language>
	<image>
		<url>$_ACCESS_URL_CLEAR/System/Default/RSS/Icon_RSS.jpg</url>
		<title>RSS -> News Generator</title>
		<link>$_ACCESS_URL_CLEAR</link>
	</image>
");

/*
 ===========================
 +
 + Fetch RSS Entries
 +
 ===========================
*/

$_DB_Query_SELECT_NEWS					= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_news ORDER BY id ASC");

while ($_DB_Query_SELECT_NEWS_Fetch_Array = $DB->fetch_array($_DB_Query_SELECT_NEWS)) {

$_MAIN_RSS_LIST_NEWS_ID					= $_DB_Query_SELECT_NEWS_Fetch_Array['id'];
$_MAIN_RSS_LIST_NEWS_AUTHOR				= $_DB_Query_SELECT_NEWS_Fetch_Array['news_author'];
$_MAIN_RSS_LIST_NEWS_DATA				= $_DB_Query_SELECT_NEWS_Fetch_Array['news_data'];
$_MAIN_RSS_LIST_NEWS_RFC					= $_DB_Query_SELECT_NEWS_Fetch_Array['news_rss_rfc'];
$_MAIN_RSS_LIST_NEWS_TITLE				= $_DB_Query_SELECT_NEWS_Fetch_Array['news_title'];

$_MAIN_RSS_SYMBOL_REPLACE[0]				= "&";
$_MAIN_RSS_SYMBOL_REPLACE[1]				= "<";
$_MAIN_RSS_SYMBOL_REPLACE[2]				= "'";

$_MAIN_RSS_SYMBOL_REPLACE_WITH[0]				= "&amp;";
$_MAIN_RSS_SYMBOL_REPLACE_WITH[1]				= "&lt;";
$_MAIN_RSS_SYMBOL_REPLACE_WITH[2]				= "&#39;";

$_MAIN_RSS_LIST_NEWS_DATA				= str_replace($_MAIN_RSS_SYMBOL_REPLACE, $_MAIN_RSS_SYMBOL_REPLACE_WITH, $_MAIN_RSS_LIST_NEWS_DATA);

echo ("
	<item>
		<title>$_MAIN_RSS_LIST_NEWS_TITLE</title>
		<link>$_ACCESS_URL_CLEAR/Cerberus.php?$_INTERNAL_USER_MODULE&#61;All_News&amp;DisplayID&#61;$_MAIN_RSS_LIST_NEWS_ID</link>
		<guid isPermaLink=\"true\">$_ACCESS_URL_CLEAR/Cerberus.php?$_INTERNAL_USER_MODULE&#61;All_News&amp;DisplayID&#61;$_MAIN_RSS_LIST_NEWS_ID</guid>
		<description>$_MAIN_RSS_LIST_NEWS_DATA</description>
		<pubDate>$_MAIN_RSS_LIST_NEWS_RFC</pubDate>
	</item>
");

} // [ + ] WHILE_ARRAY

/*
 ===========================
 +
 +
 + Kill Database Connection
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Kill Database Query
 +
 ===========================
*/

$DB->free($_DB_Query_SELECT_NEWS);

/*
 ===========================
 +
 + Kill Database Server Connection
 +
 ===========================
*/

$DB->close($_MAIN_DATABASE_CONNECTION);

echo ("
	</channel>
</rss>
");

/*
 ===========================
 +
 +
 + Flush Initialized Objects
 +
 +
 ===========================
*/

ob_end_flush();

} // [ + ] IF_CONFIG_FILE
?>