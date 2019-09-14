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
 + - File Location: root->Cerberus.php
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

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ===========================
 +
 +
 + Installation File Redirect
 +
 +
 ===========================
*/

$_INSTALLATION_FILE								= "Install.php";

if (file_exists($_INSTALLATION_FILE)) {

	header("location: Install.php");

} // [ + ] IF_FILE_EXISTS: INSTALL.PHP

/*
 ===========================
 +
 +
 + Include Configuration File
 +
 +
 ===========================
*/

$_MAIN_CONFIGURATION_FILE							= "System/Configuration/Main_Configuration.php";

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

$DB										= new DB();

/*
 ===========================
 +
 + Connect To Assigned Database
 +
 ===========================
*/

$_CERBERUS_DATABASE_CONNECTION 							= mysql_connect($_ACCESS_DATABASE_HOSTNAME, $_ACCESS_DATABASE_USERNAME, $_ACCESS_DATABASE_PASSWORD);
$_CERBERUS_DATABASE_NAME_SELECTION 						= mysql_select_db($_ACCESS_DATABASE_NAME);

if ($_CERBERUS_DATABASE_CONNECTION) {

if ($_CERBERUS_DATABASE_NAME_SELECTION) {

/*
 ===========================
 +
 +
 + Global Variables
 +
 +
 ===========================
*/

$_DB_Query_Select_Main_Settings							= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_settings WHERE id='1'");
$_DB_Query_Main_Settings_Fetch_Array						= $DB->fetch_array($_DB_Query_Select_Main_Settings);

/*
 ===========================
 +
 + Global S.Q.L. Settings
 +
 ===========================
*/

$_GLOBAL_SAFEHTML_DIRECTORY							= $_DB_Query_Main_Settings_Fetch_Array['settings_safeHTML_directory'];
$_GLOBAL_SAFEHTML_STATUS								= $_DB_Query_Main_Settings_Fetch_Array['settings_safeHTML_status'];
$_GLOBAL_COOKIE_TIME								= $_DB_Query_Main_Settings_Fetch_Array['settings_cookie_time'];
$_GLOBAL_GZIP_STATUS								= $_DB_Query_Main_Settings_Fetch_Array['settings_gzip_status'];
$_GLOBAL_IMAGE_EXTENSION								= $_DB_Query_Main_Settings_Fetch_Array['settings_image_extension'];
$_GLOBAL_LANGUAGE_DIRECTORY							= $_DB_Query_Main_Settings_Fetch_Array['settings_language_directory'];
$_GLOBAL_OFFLINE_STATUS								= $_DB_Query_Main_Settings_Fetch_Array['settings_offline_status'];
$_GLOBAL_SITE_TITLE								= $_DB_Query_Main_Settings_Fetch_Array['settings_site_title'];
$_GLOBAL_SMILES_DIRECTORY							= $_DB_Query_Main_Settings_Fetch_Array['settings_smiles_directory'];
$_GLOBAL_SOUND_EXTENSION								= $_DB_Query_Main_Settings_Fetch_Array['settings_sound_extension'];
$_GLOBAL_THEME_DIRECTORY								= $_DB_Query_Main_Settings_Fetch_Array['settings_theme_directory'];
$_GLOBAL_UPLOAD_SIZE_PRIVATE							= $_DB_Query_Main_Settings_Fetch_Array['settings_upload_size_private'];
$_GLOBAL_UPLOAD_SIZE_PUBLIC							= $_DB_Query_Main_Settings_Fetch_Array['settings_upload_size_public'];
$_GLOBAL_TEXT_EDITOR_DIRECTORY							= $_DB_Query_Main_Settings_Fetch_Array['settings_text_editor_directory'];

/*
 ===========================
 +
 + Global Cookies
 +
 ===========================
*/

$_GLOBAL_USERNAME								= $_COOKIE['cerberus_username'];
$_GLOBAL_PASSWORD								= $_COOKIE['cerberus_password'];
$_GLOBAL_LANGUAGE_COOKIE								= $_COOKIE['cerberus_language'];

/*
 ===========================
 +
 + Member Access & Themes
 +
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

/*
 ===========================
 + Fetch Member Credentials
 ===========================
*/

$_DB_Query_Select_Member_Credentials 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_members WHERE member_username='$_GLOBAL_USERNAME'");
$_DB_Query_Member_Credentials_Fetch_Array 					= $DB->fetch_array($_DB_Query_Select_Member_Credentials);

/*
 ===========================
 +
 + Global User Variables
 +
 ===========================
*/

$_GLOBAL_MEMBER_ACCESS_LEVEL							= $_DB_Query_Member_Credentials_Fetch_Array['member_access_level'];
$_GLOBAL_MEMBER_AVATAR								= $_DB_Query_Member_Credentials_Fetch_Array['member_avatar'];
$_GLOBAL_MEMBER_BANNED_STATUS							= $_DB_Query_Member_Credentials_Fetch_Array['member_banned_status'];
$_GLOBAL_MEMBER_EMAIL_ADDRESS							= $_DB_Query_Member_Credentials_Fetch_Array['member_email_address'];
$_GLOBAL_MEMBER_EXPERIENCE_AMOUNT							= $_DB_Query_Member_Credentials_Fetch_Array['member_experience_amount'];
$_GLOBAL_MEMBER_LANGUAGE								= $_DB_Query_Member_Credentials_Fetch_Array['member_language'];
$_GLOBAL_MEMBER_NUMBER_OF_POSTS							= $_DB_Query_Member_Credentials_Fetch_Array['member_number_of_posts'];
$_GLOBAL_MEMBER_RANK								= $_DB_Query_Member_Credentials_Fetch_Array['member_rank'];
$_GLOBAL_MEMBER_THEME								= $_DB_Query_Member_Credentials_Fetch_Array['member_theme'];

/*
 ===========================
 +
 + Check For Banned Member
 +
 ===========================
*/

if ($_GLOBAL_MEMBER_BANNED_STATUS >= 1) {

	header("location: Theme/$_GLOBAL_THEME_DIRECTORY/HTML/Banned.html");

} // [ + ] MEMBER_BANNED_STATUS

} // [ + ] MEMBER_ACCESS_LEVEL

/*
 ===========================
 +
 + Time, Date & Referrer
 +
 ===========================
*/

$_GLOBAL_DATE									= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_RFC								= date("r");
$_GLOBAL_DATE_MINUTES								= date("i");
$_GLOBAL_DATE_SECONDS								= date("s");
$_GLOBAL_REFERRER								= $_SERVER['HTTP_REFERER'];

/*
 ===========================
 +
 + Internet Protocol Address
 +
 ===========================
*/

$_GLOBAL_REMOTE_ADDRESS								= $_SERVER['REMOTE_ADDR'];

/*
 ===========================
 +
 +
 + Setting Cookies
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Logging In Page
 +
 ===========================
*/

if ($_GET["InternalApplication"] == "Login") {

/*
 ===========================
 +
 + Post Variables
 +
 ===========================
*/

/*
 ===========================
 + Strip Username Post Data
 ===========================
*/

$_POST_USERNAME_CLEAR								= $_POST['post_login_username'];
$_POST_USERNAME_CLEAR								= preg_replace("/'/","`", $_POST_USERNAME_CLEAR);
$_POST_USERNAME_CLEAR								= stripslashes($_POST_USERNAME_CLEAR);

/*
 ===========================
 + Strip Password Post Data
 ===========================
*/

$_POST_PASSWORD_CLEAR								= $_POST['post_login_password'];
$_POST_PASSWORD_CLEAR								= preg_replace("/'/","`", $_POST_PASSWORD_CLEAR);
$_POST_PASSWORD_CLEAR								= stripslashes($_POST_PASSWORD_CLEAR);

/*
 ===========================
 +
 + Post Data VS. Stored Data
 +
 ===========================
*/

/*
 ===========================
 + Check Database For Username
 ===========================
*/

$DB_Query_Check_Login 								= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_members WHERE member_username='$_POST_USERNAME_CLEAR'");

/*
 ===========================
 + Fetch User Data
 ===========================
*/

$DB_Query_Check_Login_Fetch_Array							= $DB->fetch_array($DB_Query_Check_Login);
$DB_Query_Check_Login_Member_Username						= $DB_Query_Check_Login_Fetch_Array['member_username'];
$DB_Query_Check_Login_Member_Password						= $DB_Query_Check_Login_Fetch_Array['member_password'];

/*
 ===========================
 + If Posted Data = Stored Data
 ===========================
*/

if (password_verify($_POST_PASSWORD_CLEAR, $DB_Query_Check_Login_Member_Password)) {

/*
 ===========================
 + Set Cookies, cPanel Access
 ===========================
*/

	setcookie("cerberus_username","$_POST_USERNAME_CLEAR", time()+$_GLOBAL_COOKIE_TIME);
	setcookie("cerberus_password","$DB_Query_Check_Login_Member_Password", time()+$_GLOBAL_COOKIE_TIME);
	
	header("location: ?$_INTERNAL_USER_MODULE=cPanel");
	
} else {

/*
 ===========================
 + Incorrect Information
 ===========================
*/

	header("location: ?$_INTERNAL_USER_MODULE=Login&Message=No_User");
	
} // [ + ] DB_Query_Number_Rows

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($DB_Query_Check_Login);

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($DB_Query_Check_Login_Array);

} // [ + ] InternalApplication_Login

/*
 ===========================
 +
 + Logging Out Page
 +
 ===========================
*/

if ($_GET["InternalApplication"] == "Logout") {

	setcookie("cerberus_username","", time()-42000);
	setcookie("cerberus_password","", time()-42000);
	setcookie("cerberus_language","", time()-42000);
	
	header("location: ?$_INTERNAL_USER_MODULE=News");

} // [ + ] InternalApplication_Logout

/*
 ===========================
 +
 + Setting Language Page
 +
 ===========================
*/

if ($_GET["InternalApplication"] == "Language") {

$_POST_LANGUAGE	 								= $_POST['post_language'];
	
	setcookie("cerberus_language","$_POST_LANGUAGE", time()+$_GLOBAL_COOKIE_TIME);
	
	header("location: ?$_INTERNAL_USER_MODULE=System_Message&Message=Language");

} // [ + ] InternalApplication_Language

/*
 ===========================
 +
 +
 + Security Protocols
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Fake Cookies VS. Real Data
 +
 ===========================
*/

/*
 ===========================
 + Check For Credentials In Cookies
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

/*
 ===========================
 + Database Query For Valid Credentials
 ===========================
*/

$_DB_Query_Main_Cookie_Security_Check 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_members WHERE member_username='$_GLOBAL_USERNAME' AND member_password='$_GLOBAL_PASSWORD'");

/*
 ===========================
 + If Cookies Match Table Entry
 ===========================
*/

if ($DB->num_rows($_DB_Query_Main_Cookie_Security_Check)) {
/**
 * Do Nothing
**/
} else {

	header("location: ?InternalApplication=Logout"); // Fake Data Found - Redirect To Logout Section

} // [ + ] Fake Cookie Check

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Cookie_Security_Check);

} // [ + ] Credentials_Check

/*
 ===========================
 +
 + Cookies VS. Directories
 +
 ===========================
*/

/*
 ===========================
 + Check For Credentials In Cookies
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

/*
 ===========================
 + Use Cookie To Define Directory
 ===========================
*/

$_USERNAME_DIRECTORY								= "Member/$_GLOBAL_USERNAME/index.html";

/*
 ===========================
 + If Directory and File Exists
 ===========================
*/

if (file_exists($_USERNAME_DIRECTORY)) {
/**
 * Do Nothing
**/
} else {

	header("location: ?InternalApplication=Logout"); // Fake Data Found - Redirect To Logout Section

} // [ + ] FILE_EXISTS: USER DIRECTORY

} // [ + ] USERNAME COOKIE

/*
 ===========================
 +
 + Check For Banned I.P. Addresses
 +
 ===========================
*/

/*
 ===========================
 + Check Entries For Banished IP Addresses
 ===========================
*/

$_DB_Query_Main_Banned_Status_Security_Check 					= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_banned_ip_addresses WHERE ip_address='$_GLOBAL_REMOTE_ADDRESS'");

/*
 ===========================
 + If User IP Matches Stored IP
 ===========================
*/

if ($DB->num_rows($_DB_Query_Main_Banned_Status_Security_Check)) {

	header("location: Theme/$_GLOBAL_THEME_DIRECTORY/HTML/Banned.html"); // Banished Internet Protocol Address Found - Redirect To IP Banishment Notification

} // [ + ] Banned Internal Protocol Address Check

/*
 ===========================
 +
 + CHMOD Loop On /Upload/
 + Default: 0777 For Debug Only
 ===========================
*/

$_CHMOD_UPLOAD_DIRECTORY								= "Upload";
$_CHMOD_UPLOAD_DIRECTORY_VALUE							= "0777";
$_OPEN_UPLOAD_DIRECTORY								= opendir($_CHMOD_UPLOAD_DIRECTORY);

while (($_CHMOD_UPLOAD_DIRECTORY_FILES = readdir($_OPEN_UPLOAD_DIRECTORY))) {

if ($_CHMOD_UPLOAD_DIRECTORY_FILES == ".." || $_CHMOD_UPLOAD_DIRECTORY_FILES == "." || $_CHMOD_UPLOAD_DIRECTORY_FILES == "index.php") {
/**
 * Skip These Files
**/
} else {

	chmod("$_CHMOD_UPLOAD_DIRECTORY", octdec($_CHMOD_UPLOAD_DIRECTORY_VALUE));
	chmod("$_CHMOD_UPLOAD_DIRECTORY/$_CHMOD_UPLOAD_DIRECTORY_FILES", octdec($_CHMOD_UPLOAD_DIRECTORY_VALUE));

} // [ + ] Read Upload Directory

} // [ + ] WHILE_LOOP

/*
 ===========================
 +
 + Member's Cookie Security Patches
 +
 ===========================
*/

/*
 ===========================
 + Null Theme Security Patch
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

if ($_GLOBAL_MEMBER_THEME != "") {

$_GLOBAL_THEME_DIRECTORY								= "$_GLOBAL_MEMBER_THEME";

} // [ + ] Theme Cookie Data Check

} // [ + ] Member Credentials Check

/*
 ===========================
 + Null Language Security Patch
 ===========================
*/
if ($_GLOBAL_LANGUAGE_COOKIE != null) {

$_GLOBAL_LANGUAGE_DIRECTORY							= $_GLOBAL_LANGUAGE_COOKIE;

} // [ + ] If Language Cookie Exists, Set Language
/*
 ===========================
 + Check Against Directories
 ===========================
*/
if ($_GLOBAL_LANGUAGE_COOKIE == ".." || $_GLOBAL_LANGUAGE_COOKIE == "." || $_GLOBAL_LANGUAGE_COOKIE == "@") {

	header("location: ?InternalApplication=Logout");

} // [ + ] If Language Cookie Was Modified, Logout
/*
 ===========================
 + Check Against String Length
 ===========================
*/
if (strlen($_GLOBAL_LANGUAGE_COOKIE) > "15") {

	header("location: ?InternalApplication=Logout");

} // [ + ] If Language Cookie Data Is Greater Than 15 Characters, Logout


/*
 ===========================
 +
 + Safe-HTML Directives
 +
 ===========================
*/

if ($_GLOBAL_SAFEHTML_STATUS >= 1) {

	include_once "System/Safe-HTML/$_GLOBAL_SAFEHTML_DIRECTORY/Safe-HTML.cerb";

} else {

	$_LIST_SAFEHTML_COMMANDS = "<CENTER>Safe-HTML Module Is: Deactivated</CENTER>";

} // [ + ] If Safe-HTML Code Setting Is On || Off

/*
 ===========================
 +
 +
 + Referrer Logging Loop
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Check For Credentials
 +
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

/*
 ===========================
 +
 + Credentials Exist, Set Referrer
 +
 ===========================
*/

$_DB_Query_Set_Member_Last_Post 							= $DB->query("UPDATE {$_ACCESS_DATABASE_PREFIX}_members SET member_last_post='$_GLOBAL_REFERRER' WHERE member_username='$_GLOBAL_USERNAME'");

/*
 ===========================
 + If Update Was Successful
 ===========================
*/

if ($_DB_Query_Set_Member_Last_Post) {
/**
 * Do Nothing
**/
} else {

	echo ($_Message_Cerberus_ERROR_SQL_MEMBER_LAST_POST);

} // [ + ] If Update Member Entry

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Set_Member_Last_Post);

} // [ + ] Member Credentials Check

/*
 ===========================
 +
 +
 + Rank Logging Loop
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Check For Valid Credentials
 +
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

/*
 ===========================
 +
 + Rank Based On Experience
 +
 ===========================
*/

/*
 ===========================
 + If Posts Less Than 50
 ===========================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS <= 50) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "1";

} // [ + ] If Member Number Of Posts Is Less Than Or Equal To 50

/*
 ===========================
 + If Posts Greater Than 100
 ===========================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 100) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "2";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 100

/*
 ===========================
 + If Posts Greater Than 500
 ===========================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 500) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "3";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 500

/*
 ===========================
 + If Posts Greater Than 1000
 ===========================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 1000) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "4";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 1000

/*
 ===========================
 + If Posts Greater Than 1500
 ===========================
*/

if ($_GLOBAL_MEMBER_NUMBER_OF_POSTS >= 1500) {

	$_MEMBER_RANK_UPDATE_DIGIT		= "5";

} // [ + ] If Member Number Of Posts Is Greater Than Or Equal To 1500

/*
 ===========================
 +
 + Update Rank
 +
 ===========================
*/

/*
 ===========================
 + Database Query Update Rank
 ===========================
*/

$_DB_Query_Main_Member_Update_Rank 						= $DB->query("UPDATE {$_ACCESS_DATABASE_PREFIX}_members SET member_rank='$_MEMBER_RANK_UPDATE_DIGIT' WHERE member_username='$_GLOBAL_USERNAME'");

/*
 ===========================
 + If Query Is Successful
 ===========================
*/

if ($_DB_Query_Main_Member_Update_Rank) {
/**
 * Do Nothing
**/
} else {

	echo ($_Message_Cerberus_ERROR_SQL_RANK);

} // [ + ] DB_Query_UPDATE_MEMBERS

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Member_Update_Rank);

/*
 ===========================
 +
 + Define Global Rank Variables
 +
 ===========================
*/

/*
 ===========================
 + Select Member Rank Entry
 ===========================
*/

$_DB_Query_Main_Member_Rank							= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_ranks ORDER BY id ASC");
$_DB_Query_Main_Member_Rank_Fetch_Array						= $DB->fetch_array($_DB_Query_Main_Member_Rank);

/*
 ===========================
 + Set Rank Variables
 ===========================
*/

$_MAIN_MEMBER_RANK_1								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_1'];
$_MAIN_MEMBER_RANK_2								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_2'];
$_MAIN_MEMBER_RANK_3								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_3'];
$_MAIN_MEMBER_RANK_4								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_4'];
$_MAIN_MEMBER_RANK_5								= $_DB_Query_Main_Member_Rank_Fetch_Array['rank_5'];

/*
 ===========================
 + Set Member Rank For Display
 ===========================
*/

if ($_GLOBAL_MEMBER_RANK == 1) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_1;

} // [ + ] If Member Rank Is 1

if ($_GLOBAL_MEMBER_RANK == 2) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_2;

} // [ + ] If Member Rank Is 2

if ($_GLOBAL_MEMBER_RANK == 3) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_3;

} // [ + ] If Member Rank Is 3

if ($_GLOBAL_MEMBER_RANK == 4) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_4;

} // [ + ] If Member Rank Is 4

if ($_GLOBAL_MEMBER_RANK == 5) {

	$_GLOBAL_MEMBER_RANK_DISPLAY = $_MAIN_MEMBER_RANK_5;

} // [ + ] If Member Rank Is 5

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Member_Rank);

} // [ + ] Check Cookie Data

/*
 ===========================
 +
 +
 + Background Application Includes
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Language File
 +
 ===========================
*/

include_once "System/Language/$_GLOBAL_LANGUAGE_DIRECTORY/Language.cerb";

/*
 ===========================
 +
 + Data Logging
 +
 ===========================
*/

/*
 ===========================
 + Log Administrator
 ===========================
*/

include_once "Module/Background/Log_Administration";

/*
 ===========================
 + Log User
 ===========================
*/

include_once "Module/Background/Log_User";

/*
 ===========================
 + Log Background
 ===========================
*/

include_once "Module/Background/Log_Background";

/*
 ===========================
 +
 + Theme
 +
 ===========================
*/

include_once "Theme/$_GLOBAL_THEME_DIRECTORY/Theme.php";

/*
 ===========================
 +
 + Text Editor Plugin
 +
 ===========================
*/

include_once "System/Text-Editor/$_GLOBAL_TEXT_EDITOR_DIRECTORY/Text-Editor.cerb";

/*
 ===========================
 +
 +
 + Offline Mode
 +
 +
 ===========================
*/

if ($_GLOBAL_OFFLINE_STATUS >= 1) {

if ($_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	echo ($_Message_Cerberus_OFFLINE_MODE_ENABLED);

} else {

	header("location: Theme/$_GLOBAL_THEME_DIRECTORY/HTML/Offline.html");

} // [ + ] If Offline Status Is On, Redirect Non-Administrator To Offline Status Web Page

} // [ + ] OFFLINE MODE IS OFF

/*
 ===========================
 +
 +
 + Page Compression
 +
 +
 ===========================
*/

if ($_GLOBAL_GZIP_STATUS >= 1) {

	ob_start("ob_gzhandler");

	$_GZIP_STATUS	= "GZIP_Compression: ON";

} else {

	$_GZIP_STATUS	= "GZIP_Compression: OFF";

} // [ + ] If GZIP Compression Is On, Specify Status

/*
 ===========================
 +
 +
 + Page Generation Start
 +
 +
 ===========================
*/

$_MAIN_PAGE_GENERATION_START_TIME							= microtime();
$_MAIN_PAGE_GENERATION_START_ARRAY						= explode(" ", $_MAIN_PAGE_GENERATION_START_TIME);
$_MAIN_PAGE_GENERATION_START_TIME							= $_MAIN_PAGE_GENERATION_START_ARRAY[1] + $_MAIN_PAGE_GENERATION_START_ARRAY[0];

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
<!--================================================================================================-->
<!--				    Cerberus Content Management System				    -->
<!--================================================================================================-->

<!--================================================================================================-->
<!--			    (C) Tinke Software, Gary Christopher Johnson's Works		    -->
<!--================================================================================================-->

<!--=============================-->
<!--        DOCUMENT TYPE        -->
<!--=============================-->

<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">

<!--==============================-->
<!--        START DOCUMENT        -->
<!--==============================-->

<HTML>

<!--==============================-->
<!--	     HEAD CONTENTS        -->
<!--==============================-->

	<HEAD>
		<TITLE>$_GLOBAL_SITE_TITLE</TITLE>
		<LINK REL=\"stylesheet\" HREF=\"Theme/$_GLOBAL_THEME_DIRECTORY/Style_Sheet/Style.css\" TYPE=\"text/css\">
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
		<META HTTP-EQUIV=Refresh CONTENT=\"216000; URL=javascript:window.close();\">
		$_GLOBAL_META_TAGS
	</HEAD>

<!--==============================-->
<!-- 	     BODY CONTENTS	  	  -->
<!--==============================-->

	<BODY>
");

/*
 ===========================
 +
 +
 + TEMPLATE LAYOUT ( 1 )
 +
 +
 ===========================
*/

echo ($_GLOBAL_LAYOUT_1);

/*
 ===========================
 +
 +
 + Administration Block
 +
 +
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	echo ($_THIS_THEMES_BLOCKS_1);

		include_once "Module/Block/Administrator.blk";

	echo ($_THIS_THEMES_BLOCKS_2);

} // [ + ] If Administrator Credentials Exist, Show Administration Panel Block

/*
 ===========================
 +
 +
 + Blocks Aligned Left
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + List Blocks Aligned Left
 +
 ===========================
*/

$_DB_Query_Main_Blocks_Aligned_Left 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_blocks WHERE block_alignment='0' AND block_file_status='1' ORDER BY block_row ASC");

while ($_DB_Query_Main_Blocks_Aligned_Left_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Blocks_Aligned_Left)) {

$_MAIN_BLOCK_ALIGNED_LEFT_FILE_NAME						= $_DB_Query_Main_Blocks_Aligned_Left_Fetch_Array['block_file_name'];
$_MAIN_BLOCK_ALIGNED_LEFT_TITLE							= $_DB_Query_Main_Blocks_Aligned_Left_Fetch_Array['block_title'];

echo ($_THIS_THEMES_BLOCKS_1);
echo ($_MAIN_BLOCK_ALIGNED_LEFT_TITLE);

include_once "Module/Block/$_MAIN_BLOCK_ALIGNED_LEFT_FILE_NAME.blk";

echo ($_THIS_THEMES_BLOCKS_2);

} // [ + ] WHILE LISTING BLOCKS ALIGNED LEFT

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Blocks_Aligned_Left);

/*
 ===========================
 +
 +
 + Theme Template Layout (2)
 +
 +
 ===========================
*/

echo ($_GLOBAL_LAYOUT_2);

/*
 ===========================
 +
 +
 + Administration Applications
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Read Application Directory
 +
 ===========================
*/

$_FIND_ADMINISTRATION_DIRECTORY							= "Module/Administration/";
$_OPEN_ADMINISTRATION_DIRECTORY							= opendir($_FIND_ADMINISTRATION_DIRECTORY);

while (($_READ_ADMINISTRATION_DIRECTORY = readdir($_OPEN_ADMINISTRATION_DIRECTORY))) {

/*
 ===========================
 +
 + Prevent RFI/LFI Exploits
 +
 ===========================
*/

if ($_READ_ADMINISTRATION_DIRECTORY == "." || $_READ_ADMINISTRATION_DIRECTORY == ".." || $_READ_ADMINISTRATION_DIRECTORY == "index.php") {
/**
 * Do Nothing
**/
} else {

/*
 ===========================
 +
 + Include Application Module
 +
 ===========================
*/

if ($_GET[$_INTERNAL_ADMINISTRATOR_MODULE] == "$_READ_ADMINISTRATION_DIRECTORY") {

/*
 ===========================
 + Check For Valid Credentials
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {


	include_once "Module/Administration/$_READ_ADMINISTRATION_DIRECTORY";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_ADMINISTRATOR);

} // [ + ] IF_ACCESS_LEVEL

} // [ + ] IF_INCLUDE

} // [ + ] IF_NOT_DIRECTORY

} // [ + ] WHILE_DIRECTORY

/*
 ===========================
 + Close Administration Directory
 ===========================
*/

closedir($_OPEN_ADMINISTRATION_DIRECTORY);

/*
 ===========================
 +
 +
 + Member Applications
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Fetch Access Permissions
 +
 ===========================
*/

$_DB_Query_Main_Select_Applications 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_applications ORDER BY id ASC");

while ($_DB_Query_Main_Select_Applications_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Select_Applications)) {

$_MAIN_APPLICATION_FILE_NAME							= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_name'];
$_MAIN_APPLICATION_FILE_PERMISSION						= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_permission'];
$_MAIN_APPLICATION_FILE_STATUS							= $_DB_Query_Main_Select_Applications_Fetch_Array['application_file_status'];

/*
 ===========================
 + IF Permission Open
 ===========================
*/

if ($_GET[$_INTERNAL_USER_MODULE] == "$_MAIN_APPLICATION_FILE_NAME") {

if (file_exists("Module/User/$_MAIN_APPLICATION_FILE_NAME")) {

if ($_MAIN_APPLICATION_FILE_STATUS >= "1") {

if ($_MAIN_APPLICATION_FILE_PERMISSION <= "0") {

	include_once "Module/User/$_MAIN_APPLICATION_FILE_NAME";

} // [ + ] IF_APPLICATION_PERMISSION

/*
 ===========================
 + IF Permission User
 ===========================
*/

if ($_MAIN_APPLICATION_FILE_PERMISSION == "1") {

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

	include_once "Module/User/$_MAIN_APPLICATION_FILE_NAME";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_MEMBER);

} // [ + ] APPLICATION_PERMISSION_MEMBER

} // [ + ] IF_APPLICATION_PERMISSION

/*
 ===========================
 + IF Permission Administrator
 ===========================
*/

if ($_MAIN_APPLICATION_FILE_PERMISSION == "2") {

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null && $_GLOBAL_MEMBER_ACCESS_LEVEL >= 2) {

	include_once "Module/User/$_MAIN_APPLICATION_FILE_NAME";

} else {

	echo ($_Message_Cerberus_APPLICATION_ACCESS_RESTRICTED_ADMINISTRATOR);

} // [ + ] APPLICATION_PERMISSION_ADMINISTRATOR

} // [ + ] IF_APPLICATION_PERMISSION

} else {

	echo ($_Message_Cerberus_APPLICATION_DEACTIVATED);

} // [ + ] IF_APPLICATION_STATUS

} else {

	echo ($_Message_Cerberus_APPLICATION_NOT_FOUND);

} // [ + ] IF_FILE_EXISTS

} // [ + ] APPLICATION_INCLUDE

} // [ + ] WHILE_ARRAY

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Select_Applications);

/*
 ===========================
 +
 +
 + Custom Applications
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Fetch Custom Application Entries
 +
 ===========================
*/

$_DB_Query_Main_Select_Custom_Applications 					= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_custom_pages ORDER BY id ASC");

while ($_DB_Query_Main_Select_Custom_Applications_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Select_Custom_Applications)) {

$_CUSTOM_APPLICATION_ID								= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['id'];
$_CUSTOM_APPLICATION_DATA							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_page_data'];
$_CUSTOM_APPLICATION_NAME							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_page_name'];
$_CUSTOM_APPLICATION_TIME							= $_DB_Query_Main_Select_Custom_Applications_Fetch_Array['custom_page_time'];

/*
 ===========================
 +
 + Display Custom Application
 +
 ===========================
*/

if ($_GET[$_INTERNAL_CUSTOM_MODULE] == "$_CUSTOM_APPLICATION_ID") {

		echo ("<CENTER><BIG><B>$_CUSTOM_APPLICATION_NAME</B></BIG></CENTER><HR>$_CUSTOM_APPLICATION_DATA<HR>Created: $_CUSTOM_APPLICATION_TIME");

} // [ + ] CUSTOM APPLICATION

} // [ + ] WHILE Fetching Custom Applications

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Select_Custom_Applications);

/*
 ===========================
 +
 +
 + Theme Template Layout (3)
 +
 +
 ===========================
*/

echo ($_GLOBAL_LAYOUT_3);

/*
 ===========================
 +
 +
 + Blocks Aligned Right
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + List Blocks Aligned Right
 +
 ===========================
*/

$_DB_Query_Main_Blocks_Aligned_Right 						= $DB->query("SELECT * FROM {$_ACCESS_DATABASE_PREFIX}_blocks WHERE block_alignment='1' AND block_file_status='1' ORDER BY block_row ASC");

while ($_DB_Query_Main_Blocks_Aligned_Right_Fetch_Array = $DB->fetch_array($_DB_Query_Main_Blocks_Aligned_Right)) {

$_MAIN_BLOCK_ALIGNED_RIGHT_FILE_NAME						= $_DB_Query_Main_Blocks_Aligned_Right_Fetch_Array['block_file_name'];
$_MAIN_BLOCK_ALIGNED_RIGHT_TITLE							= $_DB_Query_Main_Blocks_Aligned_Right_Fetch_Array['block_title'];

echo ($_THIS_THEMES_BLOCKS_1);

echo ($_MAIN_BLOCK_ALIGNED_RIGHT_TITLE);

include_once "Module/Block/$_MAIN_BLOCK_ALIGNED_RIGHT_FILE_NAME.blk";

echo ($_THIS_THEMES_BLOCKS_2);

} // [ + ] WHILE Listing Blocks Aligned Right

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Main_Blocks_Aligned_Right);

/*
 ===========================
 +
 +
 + Theme Template Layout (4)
 +
 +
 ===========================
*/

echo ($_GLOBAL_LAYOUT_4);

/*
 ===========================
 +
 +
 + Page Generation End
 +
 +
 ===========================
*/

$_MAIN_PAGE_GENERATION_END_TIME							= microtime();
$_MAIN_PAGE_GENERATION_END_ARRAY							= explode(" ", $_MAIN_PAGE_GENERATION_END_TIME);
$_MAIN_PAGE_GENERATION_END_TIME							= $_MAIN_PAGE_GENERATION_END_ARRAY[1] + $_MAIN_PAGE_GENERATION_END_ARRAY[0];
$_MAIN_PAGE_GENERATION_TOTAL_TIME							= $_MAIN_PAGE_GENERATION_END_TIME - $_MAIN_PAGE_GENERATION_START_TIME; 
$_MAIN_PAGE_GENERATION_TOTAL_TIME							= round($_MAIN_PAGE_GENERATION_TOTAL_TIME,5);

/*
 ===========================
 +
 +
 + HTML Document End Output
 +
 +
 ===========================
*/

echo ("
		<CENTER>
			This Web Site Is Powered By:&nbsp;<A HREF=\"https://www.SourceForge.net/projects/cerberuscms\" TARGET=\"_NEW\" TITLE=\"Cerberus Content Management System :: SourceForge Project Page\">Cerberus Content Management System</A>&nbsp;|&nbsp;Page Generation Time: " . $_MAIN_PAGE_GENERATION_TOTAL_TIME . " Seconds&nbsp;|&nbsp;");

/*
 ===========================
 +
 +
 + Closing User Connections
 +
 +
 ===========================
*/

/*
 ===========================
 + Kill Database Connection
 ===========================
*/

$DB->free($_DB_Query_Select_Main_Settings);

/*
 ===========================
 +
 + Kill Database Connection
 + Member Credentials Table
 ===========================
*/

if ($_GLOBAL_USERNAME && $_GLOBAL_PASSWORD != null) {

$DB->free($_DB_Query_Select_Member_Credentials);

} // [ + ] Check Member Credentials

/*
 ===========================
 +
 + Kill Database Connection
 + Banned I.P. Table
 ===========================
*/

$DB->free($_DB_Query_Main_Banned_Status_Security_Check);

/*
 ===========================
 +
 +
 + Closing Database Connections
 +
 +
 ===========================
*/

} else {

		echo ("Error: Cannot Connect To SQL Database Name: $_ACCESS_DATABASE_NAME. Check Credentials. ");

} // [ + ] IF Connection Database

} else {

		echo ("Error: Cannot Connect To SQL Database Hostname: $_ACCESS_DATABASE_HOSTNAME. Check Credentials. ");

} // [ + ] IF Connection Database Server

if ($DB->close($_CERBERUS_DATABASE_CONNECTION)) {

			echo ("Connection Closed For Internet Protocol Address: <A HREF=\"http://WhoIs.sc/$_GLOBAL_REMOTE_ADDRESS\" TITLE=\"View Who-Is Information For Internet Protocol Address: $_GLOBAL_REMOTE_ADDRESS\" TARGET=\"_NEW\">$_GLOBAL_REMOTE_ADDRESS</A>&nbsp;|&nbsp;");

} else {

			echo ("I Cannot Close The Connection For Internet Protocol Address: <A HREF=\"http://WhoIs.sc/$_GLOBAL_REMOTE_ADDRESS\" TITLE=\"View Who-Is Information For Internet Protocol Address: $_GLOBAL_REMOTE_ADDRESS\" TARGET=\"_NEW\">$_GLOBAL_REMOTE_ADDRESS</A>&nbsp;|&nbsp;");

} // [ + ] IF Close Database Connection

} else {

			echo ("Missing: $_MAIN_CONFIGURATION_FILE | <A HREF=\"Diagnose.php\" TITLE=\"Cerberus Content Management System Diagnostic Script\" TARGET=\"_NEW\">Please Click Here For Diagnostics</A>.");

} // [ + ] FILE_EXISTS: Configuration Script

echo ("
			This Web Page Will Close After One Hour Of Inactivity.
		</CENTER>
	</BODY>

<!--===============================-->
<!--	     DOCUMENT END	   -->
<!--===============================-->

</HTML>
");

/*
 ===========================
 +
 +
 + Flushing * Initialized Objects
 +
 +
 ===========================
*/

ob_end_flush();
?>