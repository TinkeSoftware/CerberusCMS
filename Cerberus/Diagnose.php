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
 + - File Location: root->Diagnose.php
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
 + Error Handling
 +
 +
 ===========================
*/

//error_reporting("E_WARNING ^ E_NOTICE");

/*
 ===========================
 +
 +
 + HTML Document Header Output
 +
 +
 ===========================
*/

echo ("
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">

<HTML>
	<HEAD>
		<TITLE>Cerberus Content Management System - Diagnostic Utility - Version: 1.2</TITLE>
		<LINK REL=\"stylesheet\" HREF=\"Theme/Cerberus/Style_Sheet/Style.css\" TYPE=\"text/css\">
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
	</HEAD>

	<BODY>
");

/*
 ===========================
 +
 +
 + System File Detection
 +
 +
 ===========================
*/

		echo ("<CENTER>[ <A HREF=\"?Application&#61;File_Checks\" TITLE=\"Check The Integrity Of Cerberus Files\">File Integrity Testing</A> - <A HREF=\"?Application&#61;MySQL_Checks\" TITLE=\"Test The MySQL Server Connection\">MySQL Server Testing</A> - <A HREF=\"?Application&#61;Login\" TITLE=\"Backup Login Form\">Backup Login Form</A> ]</CENTER><HR><BR><BR>");

if ($_GET["Application"] == "File_Checks") {

include_once "System/Language/English/Language.cerb";

		echo ("Cerberus Content Management System Diagnostic Utility - Version: 1.3<BR><BR>");

		echo ($_Message_Diagnose_EXAMINING_FILES);

		echo ($_Message_Diagnose_LISTING_FILES);

/*
 ===========================
 + Main Directory
 ===========================
*/

$_ARRAY_SYSTEM_FILES_ROOT_0				= "Cerberus.php";
$_ARRAY_SYSTEM_FILES_ROOT_1				= "Diagnose.php";
$_ARRAY_SYSTEM_FILES_ROOT_2				= "index.php";
$_ARRAY_SYSTEM_FILES_ROOT_3				= "Install.php";
$_ARRAY_SYSTEM_FILES_ROOT_4				= "RSS.php";
$_ARRAY_SYSTEM_FILES_ROOT_5				= "robots.txt";

/*
 ===========================
 + System Configuration Directory
 ===========================
*/

$_ARRAY_SYSTEM_FILES_CONFIGURATION_0			= "System/Configuration/Class_Database.php";
$_ARRAY_SYSTEM_FILES_CONFIGURATION_1			= "System/Configuration/index.php";
$_ARRAY_SYSTEM_FILES_CONFIGURATION_2			= "System/Configuration/Main_Access.php";
$_ARRAY_SYSTEM_FILES_CONFIGURATION_3			= "System/Configuration/Main_Configuration.php";

/*
 ===========================
 + English Language Directory
 ===========================
*/

$_ARRAY_SYSTEM_FILES_LANGUAGES_0				= "System/Language/English/Language.cerb";

/*
 ===========================
 + Default Safe-HTML Directory
 ===========================
*/

$_ARRAY_SYSTEM_FILES_SafeHTML_0				= "System/Safe-HTML/default/Safe-HTML.cerb";
$_ARRAY_SYSTEM_FILES_SafeHTML_1				= "System/Safe-HTML/default/index.php";

/*
 ===========================
 + Administration Modules
 ===========================
*/

$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_0		= "Module/Administration/Administrators";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_1		= "Module/Administration/Applications";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_2		= "Module/Administration/Backup";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_3		= "Module/Administration/Banish";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_4		= "Module/Administration/Blocks";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_5		= "Module/Administration/Bot_Monitor";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_6		= "Module/Administration/Categories";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_7		= "Module/Administration/cPanel";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_8		= "Module/Administration/Forum";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_9		= "Module/Administration/index.php";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_10		= "Module/Administration/Modify";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_11		= "Module/Administration/phpinfo.php";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_12		= "Module/Administration/Polls";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_13		= "Module/Administration/Publish";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_14		= "Module/Administration/Ranks";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_15		= "Module/Administration/Referrers";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_16		= "Module/Administration/Settings";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_17		= "Module/Administration/SQL_Query";
$_ARRAY_SYSTEM_FILES_MODULES_ADMINISTRATOR_18		= "Module/Administration/Submissions";

/*
 ===========================
 + Background Modules
 ===========================
*/

$_ARRAY_SYSTEM_FILES_MODULES_BACKGROUND_0			= "index.php";
$_ARRAY_SYSTEM_FILES_MODULES_BACKGROUND_1			= "Module/Background/Log_Administration";
$_ARRAY_SYSTEM_FILES_MODULES_BACKGROUND_2			= "Module/Background/Log_Background";
$_ARRAY_SYSTEM_FILES_MODULES_BACKGROUND_3			= "Module/Background/Log_User";

/*
 ===========================
 + Blocks
 ===========================
*/

$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_0			= "Module/Block/Admin.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_1			= "Module/Block/Articles.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_2			= "Module/Block/Banned.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_3			= "Module/Block/Cerberus.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_4			= "Module/Block/Files.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_5			= "Module/Block/index.php";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_6			= "Module/Block/Language.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_7			= "Module/Block/Member_List.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_8			= "Module/Block/Members.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_9			= "Module/Block/Modules.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_10			= "Module/Block/Polls.blk";
$_ARRAY_SYSTEM_FILES_MODULES_BLOCKS_11			= "Module/Block/Shouts.blk";

/*
 ===========================
 + User Modules
 ===========================
*/

$_ARRAY_SYSTEM_FILES_MODULES_USER_0			= "Module/User/All_News";
$_ARRAY_SYSTEM_FILES_MODULES_USER_1			= "Module/User/All_Shouts";
$_ARRAY_SYSTEM_FILES_MODULES_USER_2			= "Module/User/Articles";
$_ARRAY_SYSTEM_FILES_MODULES_USER_3			= "Module/User/Change_Password";
$_ARRAY_SYSTEM_FILES_MODULES_USER_4			= "Module/User/Comment";
$_ARRAY_SYSTEM_FILES_MODULES_USER_5			= "Module/User/Contact_Admin";
$_ARRAY_SYSTEM_FILES_MODULES_USER_6			= "Module/User/cPanel";
$_ARRAY_SYSTEM_FILES_MODULES_USER_7			= "Module/User/Documentation";
$_ARRAY_SYSTEM_FILES_MODULES_USER_8			= "Module/User/E-Mail";
$_ARRAY_SYSTEM_FILES_MODULES_USER_9			= "Module/User/Edit_Profile";
$_ARRAY_SYSTEM_FILES_MODULES_USER_10			= "Module/User/Files";
$_ARRAY_SYSTEM_FILES_MODULES_USER_11			= "Module/User/Forum";
$_ARRAY_SYSTEM_FILES_MODULES_USER_12			= "Module/User/Friend";
$_ARRAY_SYSTEM_FILES_MODULES_USER_13			= "Module/User/index.php";
$_ARRAY_SYSTEM_FILES_MODULES_USER_14			= "Module/User/Legal";
$_ARRAY_SYSTEM_FILES_MODULES_USER_15			= "Module/User/Links";
$_ARRAY_SYSTEM_FILES_MODULES_USER_16			= "Module/User/List";
$_ARRAY_SYSTEM_FILES_MODULES_USER_17			= "Module/User/Login";
$_ARRAY_SYSTEM_FILES_MODULES_USER_18			= "Module/User/Members";
$_ARRAY_SYSTEM_FILES_MODULES_USER_19			= "Module/User/Members_Online";
$_ARRAY_SYSTEM_FILES_MODULES_USER_20			= "Module/User/News";
$_ARRAY_SYSTEM_FILES_MODULES_USER_21			= "Module/User/Private_Files";
$_ARRAY_SYSTEM_FILES_MODULES_USER_22			= "Module/User/Private_Message";
$_ARRAY_SYSTEM_FILES_MODULES_USER_23			= "Module/User/Profile";
$_ARRAY_SYSTEM_FILES_MODULES_USER_24			= "Module/User/Referrers";
$_ARRAY_SYSTEM_FILES_MODULES_USER_25			= "Module/User/Register";
$_ARRAY_SYSTEM_FILES_MODULES_USER_26			= "Module/User/Reset_Password";
$_ARRAY_SYSTEM_FILES_MODULES_USER_27			= "Module/User/Search";
$_ARRAY_SYSTEM_FILES_MODULES_USER_28			= "Module/User/Send_Friend";
$_ARRAY_SYSTEM_FILES_MODULES_USER_29			= "Module/User/Statistics";
$_ARRAY_SYSTEM_FILES_MODULES_USER_30			= "Module/User/Submit_News";
$_ARRAY_SYSTEM_FILES_MODULES_USER_31			= "Module/User/System_Message";
$_ARRAY_SYSTEM_FILES_MODULES_USER_32			= "Module/User/Upload";
$_ARRAY_SYSTEM_FILES_MODULES_USER_33			= "Module/User/Webspace";

/*
 ===========================
 + System Files
 ===========================
*/

$_ARRAY_SYSTEM_FILES_CLASSES_0				= "System/Configuration/Class_Database.php";
$_ARRAY_SYSTEM_FILES_CLASSES_0				= "System/Configuration/Main_Access.php";
$_ARRAY_SYSTEM_FILES_CLASSES_0				= "System/Configuration/Main_Configuration.php";

/*
 ===========================
 +
 + Read Number Of Lines
 +
 ===========================
*/

// $_Diagnose_READ_FILE_ARRAY 				= basename($_SERVER['$_ARRAY_SYSTEM_FILES[$i]']); 
// $_Diagnose_COUNT_FILE_ARRAY 				= count(file($_Diagnose_READ_FILE_ARRAY);

/*
 ===========================
 +
 + Calculate MD5 Signatures->Root
 +
 ===========================
*/

$_ARRAY_SYSTEM_FILES_ROOT_0_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_0);
$_ARRAY_SYSTEM_FILES_ROOT_1_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_1);
$_ARRAY_SYSTEM_FILES_ROOT_2_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_2);
$_ARRAY_SYSTEM_FILES_ROOT_3_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_3);
$_ARRAY_SYSTEM_FILES_ROOT_4_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_4);
$_ARRAY_SYSTEM_FILES_ROOT_5_MD5				= md5_file($_ARRAY_SYSTEM_FILES_ROOT_5);

/*
 ===========================
 +
 + Calculate MD5 Signatures->System
 +
 ===========================
*/

$_ARRAY_SYSTEM_FILES_CONFIGURATION_0_MD5			= md5_file($_ARRAY_SYSTEM_FILES_CONFIGURATION_0);
$_ARRAY_SYSTEM_FILES_CONFIGURATION_1_MD5			= md5_file($_ARRAY_SYSTEM_FILES_CONFIGURATION_1);
$_ARRAY_SYSTEM_FILES_CONFIGURATION_2_MD5			= md5_file($_ARRAY_SYSTEM_FILES_CONFIGURATION_2);
$_ARRAY_SYSTEM_FILES_CONFIGURATION_3_MD5			= md5_file($_ARRAY_SYSTEM_FILES_CONFIGURATION_3);

/*
 ===========================
 +
 + Check For Root Files
 +
 ===========================
*/

/*
 ===========================
 + If File(s) Missing->Root->Cerberus.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_0)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_0<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_0</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_0_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->Root->Diagnose.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_1)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_1<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_1</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_1_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->Root->index.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_2)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_2<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_2</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_2_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->Root->Install.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_3)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_3<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_3</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_3_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->Root->RSS.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_4)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_4<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_4</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_4_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->Root->Robots.txt
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_ROOT_5)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_ROOT_5<BR>");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_ROOT_5</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_ROOT_5_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 +
 + Check For System Files
 +
 ===========================
*/

/*
 ===========================
 + If File(s) Missing->System->Configuration->Class_Database.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_CONFIGURATION_0)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_CONFIGURATION_0");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_0</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_0_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->System->Configuration->index.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_CONFIGURATION_1)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_CONFIGURATION_1");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_1</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_1_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->System->Configuration->Main_Access.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_CONFIGURATION_2)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_CONFIGURATION_2");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_2</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_2_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + If File(s) Missing->System->Configuration->Main_Configuration.php
 ===========================
*/

if (!file_exists($_ARRAY_SYSTEM_FILES_CONFIGURATION_3)) {
	echo ("Error, Missing File: $_ARRAY_SYSTEM_FILES_CONFIGURATION_3");
} else {
	echo ("File: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_3</I> Exists. Message Digest 5 Algorithm Signature: <I>$_ARRAY_SYSTEM_FILES_CONFIGURATION_3_MD5</I><BR>");
} // [ + ] IF_FILE_DOES_NOT_EXIST

/*
 ===========================
 + Diagnostics Finished
 ===========================
*/

	echo ($_Message_Diagnose_DIAGNOSTICS_FINISHED);

} // [ + ] IF Application_File_Checks

/*
 ===========================
 +
 +
 + MySQL Database Connection Test
 +
 +
 ===========================
*/

if ($_GET["Application"] == "MySQL_Checks") {

	echo ("[ * ] Including Configuration File...<BR>");

	include_once "System/Configuration/Main_Configuration.php";

	echo ("[ * ] Configuration File Included Successfully.<BR>");

	echo ("[ * ] Including Database Server Access File...<BR>");

	include_once "System/Configuration/Main_Access.php";

	echo ("[ * ] Database Server Access File Included Successfully.<BR>");

	echo ("[ * ] Connecting To MySQL Database Server...<BR>");

	if (mysql_connect($_ACCESS_DATABASE_HOSTNAME, $_ACCESS_DATABASE_USERNAME, $_ACCESS_DATABASE_PASSWORD)) {

	echo ("[ * ] Connection To MySQL Server: <I>$_ACCESS_DATABASE_HOSTNAME</I> With Username: <I>$_ACCESS_DATABASE_USERNAME</I> Was Successful.<BR>");
} else {
	echo ("[ * ] Connection To MySQL Server: <I>$_ACCESS_DATABASE_HOSTNAME</I> With Username: <I>$_ACCESS_DATABASE_USERNAME</I> Was *NOT* Successful.<BR>");
} // [ + ] IF_CONNECT_TO_MySQL_DATABASE_SERVER

	echo ("[ * ] Connecting To MySQL Server Database...<BR>");

	if (mysql_select_db($_ACCESS_DATABASE_NAME)) {

	echo ("[ * ] Connection To MySQL Server Database: <I>$_ACCESS_DATABASE_NAME</I> Was Successful.<BR>");
} else {
	echo ("[ * ] Connection To MySQL Server Database: <I>$_ACCESS_DATABASE_NAME</I> Was *NOT* Successful.<BR>");
} // [ + ] IF_CONNECT_TO_MySQL_SERVER_DATABASE

} // [ + ] IF_Application_MySQL_Test

/*
 ===========================
 +
 +
 + Backdoor / Backup Login Form
 +
 +
 ===========================
*/

if ($_GET["Application"] == "Login") {

echo ("
		<FORM ACTION=\"Cerberus.php?InternalApplication&#61;Login\" METHOD=\"POST\">
			<HR>Backup Login Form<HR>
			Member Username:<BR>
				<INPUT TYPE=\"TEXT\" NAME=\"post_login_username\"><BR>
			Member Password:<BR>
				<INPUT TYPE=\"PASSWORD\" NAME=\"post_login_password\"><BR>
			<INPUT TYPE=\"SUBMIT\" VALUE=\"Login\">
		</FORM>
");

} // [ + ] IF_Application_Login

echo ("
	</BODY>
</HTML>
");
?>