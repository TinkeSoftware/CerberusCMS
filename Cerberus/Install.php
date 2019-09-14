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
 + - File Location: root->Install.php
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
 + PHP Error Handling
 +
 +
 ===========================
*/

error_reporting("E_WARNING ^ E_NOTICE");

/*
 ===========================
 +
 +
 + HTML Document Header Output
 +
 +
 ===========================
*/

echo ("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">

<HTML>
	<HEAD>
		<TITLE>Cerberus Content Management System - Installation Process</TITLE>
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
		<LINK REL=\"stylesheet\" HREF=\"Theme/Cerberus/Style_Sheet/Style.css\" TYPE=\"text/css\">
	</HEAD>

	<BODY>
		<TABLE WIDTH=\"100%\"><TR><TD VALIGN=\"top\">
");

/*
 ===========================
 +
 +
 + File Includes
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Configuration File
 +
 ===========================
*/

include_once("./System/Configuration/Main_Configuration.php");

/*
 ===========================
 +
 +
 + Install Form Post Variables
 +
 +
 ===========================
*/

$_INSTALL_FORM_POST_HOSTNAME					= $_POST['post_sql_server_hostname'];
$_INSTALL_FORM_POST_HOSTNAME_USERNAME				= $_POST['post_sql_server_hostname_username'];
$_INSTALL_FORM_POST_HOSTNAME_PASSWORD				= $_POST['post_sql_server_hostname_password'];
$_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME			= $_POST['post_sql_server_hostname_database_name'];
$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX			= $_POST['post_sql_server_database_prefix'];
$_INSTALL_FORM_POST_CREATE_DATABASE				= $_POST['post_create_database'];
$_INSTALL_FORM_POST_EMAIL_ADDRESS					= $_POST['post_email_address'];
$_INSTALL_FORM_POST_SECURE_URL					= $_POST['post_secure_url'];
$_INSTALL_FORM_POST_CLEAR_URL					= $_POST['post_clear_url'];

if (!$_INSTALL_FORM_POST_HOSTNAME) {

/*
 ===========================
 +
 +
 + Installation Form
 + 
 + 
 ===========================
*/

echo ("
		<HR><CENTER><BIG><B>[ <A HREF=\"https://www.SourceForge.net/projects/cerberuscms/files/Documentation/\" TARGET=\"_NEW\" TITLE=\"Read Installation Walkthrough Documentation\">Installation Walkthrough</A> ]</B></BIG></CENTER><HR>
		<BR>
		<FORM ACTION=\"?\" METHOD=\"post\">
		* SQL Database Server Hostname:<BR>
		[ Usually: 'localhost' ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_server_hostname\" VALUE=\"localhost\"><BR>
		* SQL Database Access Username:<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_server_hostname_username\"><BR>
		* SQL Database Access Password:<BR>
			<INPUT TYPE=\"password\" NAME=\"post_sql_server_hostname_password\"><BR>
		* SQL Database Name:<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_server_hostname_database_name\"><BR>
		* SQL Database Tables Prefix:<BR>
		[ Example: 'MySQLDatabaseTables' ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_sql_server_database_prefix\"><BR>
		* Your Electronic Mail Address:<BR>
		[ For System / Activity Notifications ]<BR>
			<INPUT TYPE=\"text\" NAME=\"post_email_address\"><BR>
		* Secure Uniform Resource Locator With Path-To-Cerberus Directory:<BR>
		[ SWU, Secure Sockets Layer ( SSL ), Transport Layer Security ( TLS ), etc. Example: https://TinkeSoftware.com/Cerberus ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_secure_url\"><BR>
		* Clear Uniform Resource Locator With Path-To-Cerberus Directory:<BR>
		[ Example: http://TinkeSoftware.com/Cerberus ]<BR>
			<INPUT TYPE=\"TEXT\" NAME=\"post_clear_url\"><BR>
				<INPUT TYPE=\"checkbox\" NAME=\"post_create_database\"> Create This Database ?<BR>
			<INPUT TYPE=\"submit\" VALUE=\"Install\">
		</FORM><BR><BR>
		<B>[&nbsp;!&nbsp;]&nbsp;*Nix Server Users ( Linux, Unix, BSD, GNU, etc. ): Please <A HREF=\"https://en.wikipedia.org/wiki/Chmod\" TITLE=\"Access Control List // CHMOD Wikipedia Article\">CHMOD</A> the following directories, subdirectories and files the correct read/write permissions before proceeding with the installation:</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;System</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Temporary</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Upload</B><BR>
		<B>[&nbsp;*&nbsp;]&nbsp;User</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;*Nix Server Users ( Linux, Unix, BSD, GNU, etc. ): Please refer to the Installation Manual for a complete list of permissions that should be applied to each individual file. This Installation Script is capable of setting the correct permissions to each directory and file. Click [ <A HREF=\"?Page&#61;File_Permissions\" TITLE=\"Run Permissions Settings Loop\">here</A> ] to run the Permissions Loop.</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Microsoft Windows Server Users: All of Cerberus Files are on 'Read Only' by default, and in order to install Cerberus correctly you must remove the 'Read Only' flag on each file listed in the Installation Walkthrough.<BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;If you would like additional security for the Administration cPanel please install an .htaccess file into the <I>./Module/Administration/</I> directory with a username and password before proceeding with this installation.</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Cerberus Content Management Systems programming has been tested by vulnerability scanning software and it has passed checks against all rudimentary vulnerabilities and exploit techniques, such as:<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;S.Q.L. Injection Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Cookie Injection Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;MD-5 / SHA-128 / SHA-256 Hash Decryption Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Cross Site Scripting Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Large File Upload Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Local and Remote File Inclusion Attacks<BR>
		<B>[&nbsp;*&nbsp;]&nbsp;Local and Remote Code Execution Attacks<BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Please keep your server software, kernels and applications up-to-date and set server security policies that comply with security standards to prevent any exploitation of your data. It is up to the Administrator of the Web Server running Cerberus Content Management System to install Cerberus correctly by following each of the important steps stated above and outlined in the documentation file for this project - not doing so may leave the Internal System open to attacks, double check the steps before proceeding.</B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;This Installation Script has not been secured from vulnerabilities, do not leave this Installation Script on a live server for longer than is needed to install Cerberus Content Management System.<BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;If you are unable to install the S.Q.L. Tables please click [ <A HREF=\"System/Default/MySQL/index.php\" TITLE=\"Open S.Q.L. Data Generator Script\" TARGET=\"_NEW\">here</A> ], Copy the S.Q.L. Tables and Manually Paste them into your S.Q.L. Manager / Editor.</B><BR><BR>

		<B>[&nbsp;+&nbsp;]&nbsp;Software Engine Versions and Information:</B><BR><BR>

		<B>Cerberus Content Management System Information:</B><BR>
		<B>->&nbsp;<A HREF=\"?Page&#61;Cerberus_Information\" TITLE=\"View Detailed Information About What Cerberus Content Management System Version Is Currently Running\">Information About The Currently Running Cerberus CMS Version</A><B><BR><BR>
		
		<B>Post Hypertext Preprocessor ( PHP ) Interpreter & Zend Engine Information:</B><BR>
		<B>->&nbsp;<A HREF=\"?Page&#61;PHP_Information\" TITLE=\"View Detailed Information About What PHP Version Is Currently Running\">Information About The Currently Running PHP Version</A></B><BR>
		<B>->&nbsp;<A HREF=\"?Page&#61;PHP_Extensions\" TITLE=\"View Information About The Loaded PHP Extensions\">PHP Extensions Currently Loaded</A></B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Internal Documents:</B><BR>
		<B>->&nbsp;<A HREF=\"About.txt\" TITLE=\"View The About File\">About</A></B><BR>
		<B>->&nbsp;<A HREF=\"Bug_Tracker.txt\" TITLE=\"View The Bug Tracker File\">Bug Tracker</A></B><BR>
		<B>->&nbsp;<A HREF=\"Change-Log.txt\" TITLE=\"View The Change Log File\">Change Log</A></B><BR>
		<B>->&nbsp;<A HREF=\"File-List.txt\" TITLE=\"View The File List Document - This Document Was Generated By The Programmers of Cerberus, It Shows Detailed File and Directory Listings, Progress Reports On Files Within The Default Cerberus Releases\">File List</A></B><BR>
		<B>->&nbsp;<A HREF=\"License.txt\" TITLE=\"View The License File\">License</A></B><BR>
		<B>->&nbsp;<A HREF=\"Read_Me.txt\" TITLE=\"View The Read Me File\">Read Me</A></B><BR>
		<B>->&nbsp;<A HREF=\"To-Do.txt\" TITLE=\"View The To Do Notes File\">To Do Notes</A></B><BR>
		<B>->&nbsp;<A HREF=\"Version.txt\" TITLE=\"View The Version Notes File\">Version Notes</A></B><BR><BR>

		<B>[&nbsp;!&nbsp;]&nbsp;Modify and Configure These Documents Before Proceeeding With Installation:</B><BR>
		<B>->&nbsp;<A HREF=\"robots.txt\" TITLE=\"View The Robots File\">Robots</A></B><BR>
		<B>->&nbsp;<A HREF=\"TOS-PP.txt\" TITLE=\"View The Terms of Service & Privacy Policy File\">Terms of Service & Privacy Policy</A></B><BR><BR>
");

} else {

if (!$_INSTALL_FORM_POST_CREATE_DATABASE) {

/*
 ===========================
 +
 +
 + If Installation Form Posted
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Delete Original Access File
 +
 ===========================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Secure-Deleting Original Configuration File...<BR>");

		unlink("System/Configuration/Main_Access.php");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Creating New Configuration File With Installer Specifications...<BR>");

/*
 ===========================
 +
 + Create New Access File
 +
 ===========================
*/

/*
 ===========================
 + Define Access File Variables
 ===========================
*/

$_ACCESS_FILE_FILENAME	= "System/Configuration/Main_Access.php";
$_ACCESS_FILE_DATA		= "<?PHP
\$_ACCESS_ADMINISTRATOR_EMAIL		= \"$_INSTALL_FORM_POST_EMAIL_ADDRESS\";
\$_ACCESS_DATABASE_HOSTNAME 		= \"$_INSTALL_FORM_POST_HOSTNAME\";
\$_ACCESS_DATABASE_USERNAME 		= \"$_INSTALL_FORM_POST_HOSTNAME_USERNAME\";
\$_ACCESS_DATABASE_PASSWORD 		= \"$_INSTALL_FORM_POST_HOSTNAME_PASSWORD\";
\$_ACCESS_DATABASE_NAME 			= \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME\";
\$_ACCESS_DATABASE_PREFIX 		= \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\";
\$_ACCESS_URL_CLEAR 			= \"$_INSTALL_FORM_POST_CLEAR_URL\";
\$_ACCESS_URL_SECURE 			= \"$_INSTALL_FORM_POST_SECURE_URL\";
?>
";

/*
 ===========================
 + Write Data To Access File
 ===========================
*/

$_OPEN_ACCESS_FILE_FILENAME 						= fopen($_ACCESS_FILE_FILENAME, "w");

fwrite($_OPEN_ACCESS_FILE_FILENAME, "$_ACCESS_FILE_DATA");
fclose($_OPEN_ACCESS_FILE_FILENAME);

echo ("[ Configuration Files Created ]<BR><BR> [ <A HREF=\"?Page&#61;Install_Defaults\" TITLE=\"Install Administration Account\">Install Administration Account</A> - <A HREF=\"?Page&#61;Unlink_Installation\" TITLE=\"Remove Installation Files\">Skip To Removing Installation Files Without Installing Administration Account</A> ]");

} else {

/*
 ===========================
 +
 + Attempt To Use Post-Data
 +
 ===========================
*/

/*
 ===========================
 + Connect To Database Server
 ===========================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Connection To Specified Database Server... Please Wait.<BR>");

$_MAIN_INSTALLATION_DATABASE_CONNECTION	= mysql_connect($_INSTALL_FORM_POST_HOSTNAME, $_INSTALL_FORM_POST_HOSTNAME_USERNAME, $_INSTALL_FORM_POST_HOSTNAME_PASSWORD);

if ($_MAIN_INSTALLATION_DATABASE_CONNECTION) {
	echo ("[ Connected ]<BR>");

/*
 ===========================
 + Create Specified Database
 ===========================
*/

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Creating Specified Database... Please Wait.<BR>");

$_MAIN_INSTALLATION_DATABASE_CREATE					= mysql_query("CREATE DATABASE $_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME") or die(mysql_error());

/*
 ===========================
 + Connect To Created Database
 ===========================
*/

if ($_MAIN_INSTALLATION_DATABASE_CREATE) {
	echo ("[ Done ]<BR>");
	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Connection To Created Database: <I>$_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME</I>... Please Wait.<BR>");

$_MAIN_INSTALLATION_SELECT_DATABASE					= mysql_select_db($_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME);

/*
 ===========================
 + Install S.Q.L. Tables
 ===========================
*/

if ($_MAIN_INSTALLATION_SELECT_DATABASE) {
	echo ("[ Done ]<BR>");
	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing S.Q.L. Tables... Please Wait.<BR>");

/*
 ===========================
 + Default S.Q.L. Tables
 ===========================
*/

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_ahref (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
ahref_name VARCHAR(250),
ahref_row CHAR(3),
ahref_url VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_applications (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_file_name VARCHAR(100),
application_file_permission CHAR(1),
application_file_status CHAR(1),
PRIMARY KEY (id)
");

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_articles (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
article_author VARCHAR(50),
article_data TEXT,
article_time VARCHAR(50),
article_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_banned_ip_addresses (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
ip_address VARCHAR(128),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_blocks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
block_file_name VARCHAR(250),
block_alignment CHAR(1),
block_row CHAR(2),
block_file_status CHAR(1),
block_title VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_categories (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
category_description VARCHAR(250),
category_time VARCHAR(50),
category_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_comments (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
comment_author VARCHAR(50),
comment_data TEXT,
comment_application_id CHAR(20),
comment_application_name VARCHAR(100),
comment_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_custom_pages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
custom_page_data TEXT,
custom_page_name VARCHAR(250),
custom_page_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_files (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
file_author VARCHAR(50),
file_category VARCHAR(250),
file_description TEXT,
file_image VARCHAR(50),
file_location VARCHAR(50),
file_number_of_downloads CHAR(15),
file_time VARCHAR(50),
file_title VARCHAR(50),
file_uploader VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_forum_forum (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
forum_access_level CHAR(1),
forum_date VARCHAR(50),
forum_description TEXT,
forum_title VARCHAR(200),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_forum_post (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
post_access_level CHAR(1),
post_author VARCHAR(50),
post_data TEXT,
post_date VARCHAR(50),
post_last_edit VARCHAR(50),
post_topic_id CHAR(20),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_forum_topic (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
topic_access_level CHAR(1),
topic_date VARCHAR(50),
topic_description TEXT,
topic_forum_id CHAR(20),
topic_last_post VARCHAR(50),
topic_last_poster CHAR(20),
topic_title VARCHAR(200),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
link_author VARCHAR(50),
link_description TEXT,
link_time VARCHAR(50),
link_title VARCHAR(50),
link_url VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_members (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
member_access_level CHAR(1),
member_avatar VARCHAR(50),
member_banned_status CHAR(1),
member_location VARCHAR(250),
member_email_address CHAR(250),
member_experience_amount CHAR(10),
member_first_name CHAR(100),
member_homepage CHAR(250),
member_join_date VARCHAR(50),
member_language VARCHAR(20),
member_last_name CHAR(50),
member_last_post VARCHAR(100),
member_mood VARCHAR(250),
member_music VARCHAR(250),
member_username VARCHAR(50),
member_newsletter CHAR(1),
member_number_of_posts CHAR(10),
member_online_status VARCHAR(14),
member_password VARCHAR(250),
member_picture VARCHAR(45),
member_profile_about TEXT,
member_rank CHAR(1),
member_signature VARCHAR(250),
member_sound CHAR(1),
member_t_logged CHAR(1),
member_t_random VARCHAR(32),
member_theme VARCHAR(50),
member_icq VARCHAR(250),
member_facebook VARCHAR(250),
member_twitter VARCHAR(250),
member_instagram VARCHAR(250),
member_skype VARCHAR(250),
member_spotify VARCHAR(250),
member_linkedin VARCHAR(250),
member_snapchat VARCHAR(250),
member_youtube VARCHAR(250),
member_discord VARCHAR(250),
member_pgp_key_block TEXT,
member_bitcoin_address VARCHAR(250),
member_keybase VARCHAR(250),
member_ip_address VARCHAR(250),
member_authorized_ip_address VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_news (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
news_author VARCHAR(50),
news_avatar VARCHAR(50),
news_data TEXT,
news_mood VARCHAR(250),
news_music VARCHAR(250),
news_rss_rfc TEXT,
news_time VARCHAR(50),
news_title VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_private_messages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
private_message_from VARCHAR(50),
private_message_recipient VARCHAR(50),
private_message_subject VARCHAR(250),
private_message_data TEXT,
private_message_sent_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_ranks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
rank_1 VARCHAR(100),
rank_2 VARCHAR(100),
rank_3 VARCHAR(100),
rank_4 VARCHAR(100),
rank_5 VARCHAR(100),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_settings (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
settings_safeHTML_directory VARCHAR(50),
settings_safeHTML_status CHAR(1),
settings_cookie_time VARCHAR(10),
settings_gzip_status CHAR(1),
settings_image_extension CHAR(3),
settings_language_directory VARCHAR(50),
settings_offline_status CHAR(1),
settings_site_title VARCHAR(250),
settings_smiles_directory VARCHAR(50),
settings_sound_extension VARCHAR(4),
settings_theme_directory VARCHAR(50),
settings_upload_size_private CHAR(15),
settings_upload_size_public CHAR(15),
settings_text_editor_directory VARCHAR(250),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_shouts (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
shout_author VARCHAR(50),
shout_data VARCHAR(250),
shout_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_statistics (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
statistics_number_of_hits CHAR(15),
statistics_start_date VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_news_submissions (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
submission_author VARCHAR(50),
submission_data TEXT,
submission_time VARCHAR(50),
PRIMARY KEY (id)
");

mysql_query("
CREATE TABLE \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\"_system_message (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
system_message_data TEXT,
system_message_member VARCHAR(50),
PRIMARY KEY (id)
");

		echo ("[ Done ]<BR>");

		echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Attempting Creation of Database Access Configuration File...<BR>");

/*
 ===========================
 +
 + Create New Access File
 +
 ===========================
*/

/*
 ===========================
 + Define Access File Variables
 ===========================
*/

$_ACCESS_FILE_FILENAME	= "System/Configuration/Main_Access.php";
$_ACCESS_FILE_DATA		= "<?PHP
\$_ACCESS_ADMINISTRATOR_EMAIL		= \"$_INSTALL_FORM_POST_EMAIL_ADDRESS\";
\$_ACCESS_DATABASE_HOSTNAME 		= \"$_INSTALL_FORM_POST_HOSTNAME\";
\$_ACCESS_DATABASE_USERNAME 		= \"$_INSTALL_FORM_POST_HOSTNAME_USERNAME\";
\$_ACCESS_DATABASE_PASSWORD 		= \"$_INSTALL_FORM_POST_HOSTNAME_PASSWORD\";
\$_ACCESS_DATABASE_NAME 			= \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_NAME\";
\$_ACCESS_DATABASE_PREFIX 		= \"$_INSTALL_FORM_POST_HOSTNAME_DATABASE_PREFIX\";
\$_ACCESS_URL_CLEAR 			= \"$_INSTALL_FORM_POST_CLEAR_URL\";
\$_ACCESS_URL_SECURE 			= \"$_INSTALL_FORM_POST_SECURE_URL\";
?>
";

/*
 ===========================
 + Write Data To Access File
 ===========================
*/

$_OPEN_ACCESS_FILE_FILENAME 						= fopen($_ACCESS_FILE_FILENAME, "w");

fwrite($_OPEN_ACCESS_FILE_FILENAME, "$_ACCESS_FILE_DATA");
fclose($_OPEN_ACCESS_FILE_FILENAME);

echo ("[ Done ]<BR><BR>[ <A HREF=\"?Page&#61;Install_Defaults\" TITLE=\"Install Administrator\">Install Administrator -></A> ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect to the Database.<BR>");

} // [ + ] IF_DATABASE_CONNECTION

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Create the Database.<BR>");

} // [ + ] IF_CREATE_DATABASE

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect.<BR>");

} // [ + ] IF_CONNECT

} // [ + ] IF_NULL_CREATE

} // [ + ] IF_NULL_HOST

/*
 ===========================
 +
 +
 + Install Defaults Page
 +
 +
 ===========================
*/

if ( $_GET["Page"] == "Install_Defaults" ) {

/*
 ===========================
 +
 + Form Post Variables
 +
 ===========================
*/

$_POST_ADMINISTRATOR_EMAIL_ADDRESS					= $_POST['post_administrator_email_address'];
$_POST_ADMINISTRATOR_USERNAME						= $_POST['post_administrator_username'];
$_POST_ADMINISTRATOR_PASSWORD_1						= $_POST['post_administrator_password_1'];
$_POST_ADMINISTRATOR_PASSWORD_2						= $_POST['post_administrator_password_2'];

$_POST_ADMINISTRATOR_EMAIL_ADDRESS					= strtolower($_POST_ADMINISTRATOR_EMAIL_ADDRESS);

/*
 ===========================
 +
 + Password Hashing System
 +
 ===========================
*/

$_POST_ADMINISTRATOR_PASSWORD_3						= password_hash($_POST_ADMINISTRATOR_PASSWORD_1, PASSWORD_BCRYPT);

/*
 ===========================
 +
 + Create Administrator Form
 +
 ===========================
*/

if ((!$_POST_ADMINISTRATOR_USERNAME) || (!$_POST_ADMINISTRATOR_PASSWORD_1) || (!$_POST_ADMINISTRATOR_PASSWORD_2)) {

echo ("
	<HR><CENTER>Create Administration Account</CENTER><HR><BR>
	<FORM ACTION=\"?Page&#61;Install_Defaults\" METHOD=\"post\">
	Please Create Your Administration Account:<BR>
	[ It Is Recommended That You Use a Random Password Generator and Storage Application Such as KeePass Password Safe, Please Click [&nbsp;<A HREF=\"https://KeePass.info/\" TITLE=\"KeePass Password Safe Official Website\" TARGET=\"_NEW\">Here</A>&nbsp;] To Download and Install KeePass ]<BR>
	* Administrator Electronic Mail Address:<BR>
	<INPUT TYPE=\"text\" NAME=\"post_administrator_email_address\" MAXLENGTH=\"100\"><BR>	
	* Administrator Username:<BR>
	<INPUT TYPE=\"text\" NAME=\"post_administrator_username\" MAXLENGTH=\"50\"><BR>
	* Administrator Password:<BR>
	[ Maximum Length: 32 Characters, Alpha-Numeric ]<BR>
	<INPUT TYPE=\"password\" NAME=\"post_administrator_password_1\" MAXLENGTH=\"32\"><BR>
	* Administrator Password:<BR>
	[ Again ]<BR>
	<INPUT TYPE=\"password\" NAME=\"post_administrator_password_2\" MAXLENGTH=\"32\"><BR>
	<INPUT TYPE=\"submit\" VALUE=\"Submit\">
	</FORM><BR>
");

} else {

/*
 ===========================
 +
 + Check Against Password Inputs
 +
 ===========================
*/

if ($_POST_ADMINISTRATOR_PASSWORD_1 == "$_POST_ADMINISTRATOR_PASSWORD_2") {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Default S.Q.L. Data to Tables:<BR>");

include_once "System/Configuration/Main_Configuration.php";

/*
 ===========================
 +
 + Database Connection Variables
 +
 ===========================
*/

$_MAIN_INSTALLATION_DATA_CONNECT_DATABASE				= mysql_connect($_ACCESS_DATABASE_HOSTNAME, $_ACCESS_DATABASE_USERNAME, $_ACCESS_DATABASE_PASSWORD);
$_MAIN_INSTALLATION_DATA_SELECT_DATABASE				= mysql_select_db($_ACCESS_DATABASE_NAME);

/*
 ===========================
 + Connect To S.Q.L. Server
 ===========================
*/

if ($_MAIN_INSTALLATION_DATA_CONNECT_DATABASE) {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Connected to Database Server: </I>$_ACCESS_DATABASE_HOSTNAME</I> Successfully.<BR>");

/*
 ===========================
 + Connect To S.Q.L. Database
 ===========================
*/

if ($_MAIN_INSTALLATION_DATA_SELECT_DATABASE) {

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Connected to Database: </I>$_ACCESS_DATABASE_NAME</I> Successfully.<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Links... Please Wait.<BR>");

/*
 ===========================
 + Install Default Links
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Articles','001','?Application&#61;Articles&amp;DisplayID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Contact','002','?Application&#61;Contact_Admin')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Documentation','003','?Application&#61;Documentation')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Files','004','?Application&#61;Files&amp;CategoryID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Forum','005','?Application&#61;Forum&amp;ForumID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Legal','006','?Application&#61;Legal')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Links','007','?Application&#61;Links&amp;DisplayID&#61;All')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Login','008','?Application&#61;Login')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Member List','009','?Application&#61;Members')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Members Online','010','?Application&#61;Members_Online')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('News','011','?Application&#61;News')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Referrers','013','?Application&#61;Referrers')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('RSS Feed','014','RSS.php')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Register','015','?Application&#61;Register')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Search','016','?Application&#61;Search')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Statistics','017','?Application&#61;Statistics')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Submit Link','018','?Application&#61;Links&amp;SubmitLink&#61;Yes')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Submit News','019','?Application&#61;Submit_News')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Upload File','020','?Application&#61;Upload')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Welcome!','021','?customApplication&#61;1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Applications... Please Wait.<BR>");

/*
 ===========================
 + Install Default Applications
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_News','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_Shouts','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Articles','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Application_List','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Change_Password','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Comment','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Contact_Admin','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('cPanel','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Documentation','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Edit_Profile','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('E-Mail','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Files','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forum','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Friend','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Legal','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Links','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('List','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Login','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members_Online','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('News','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Files','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Message','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Profile','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Referrers','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Register','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Reset_Password','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Search','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Send_Friend','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Statistics','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Submit_News','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('System_Message','0','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Upload','1','1')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Webspace','1','1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Blocks... Please Wait.<BR>");

/*
 ===========================
 + Install Default Blocks
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Articles','0','3','1','<CENTER><B>Articles</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Banned','0','4','1','<CENTER><B>Banned IP Addresses</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Cerberus','1','1','1','<CENTER><B>Cerberus</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Files','1','3','1','<CENTER><B>Files</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Language','1','6','1','<CENTER><B>Set Language</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Modules','0','1','1','<CENTER><B>Modules</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Members','0','2','1','<CENTER><B>Member Panel</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Member_List','1','4','1','<CENTER><B>Newest Members</B></CENTER><HR>')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Shouts','1','5','1','<CENTER><B>Shout Messages</B></CENTER><HR>')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Specified Administrator Account... Please Wait.<BR>");

/*
 ===========================
 + Install Administrator
 ===========================
*/

$_GLOBAL_DATE								= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_MD5							= md5($_GLOBAL_DATE);

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_email_address,member_experience_amount,member_join_date,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','$_POST_ADMINISTRATOR_EMAIL_ADDRESS','0','$_GLOBAL_DATE','$_POST_ADMINISTRATOR_USERNAME','1','1','$_POST_ADMINISTRATOR_PASSWORD_3','1','$_GLOBAL_DATE_MD5','0')");
mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_email_address,member_first_name,member_last_name,member_experience_amount,member_join_date,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','cerberuscms@protonmail.com','Cerberus','Cerberus','0','$_GLOBAL_DATE','Cerberus','1','1','$_POST_ADMINISTRATOR_PASSWORD_3','1','$_GLOBAL_DATE_MD5','0')");

/*
 ===========================
 + Make Administrator Directory
 ===========================
*/

mkdir("Member/$_POST_ADMINISTRATOR_USERNAME");
mkdir("Member/$_POST_ADMINISTRATOR_USERNAME/Friend");
mkdir("Member/$_POST_ADMINISTRATOR_USERNAME/E-Mail");
copy("System/Default/Register/Register.html","Member/$_POST_ADMINISTRATOR_USERNAME/index.html");
copy("System/Default/Friend/Friend.cerb","Member/$_POST_ADMINISTRATOR_USERNAME/E-Mail/$_POST_ADMINISTRATOR_EMAIL_ADDRESS");
copy("System/Default/Friend/Friend.cerb","Member/E-Mail_Addresses/$_POST_ADMINISTRATOR_EMAIL_ADDRESS");
copy("System/Configuration/index.php","Member/$_POST_ADMINISTRATOR_USERNAME/E-Mail/index.php");

/*
 ===========================
 + Make Backup Administrator Directory ( Cerberus )
 ===========================
*/

mkdir("Member/Cerberus");
mkdir("Member/Cerberus/Friend");
mkdir("Member/Cerberus/E-Mail");
copy("System/Default/Register/Register.html","Member/Cerberus/index.html");
copy("System/Default/Friend/Friend.cerb","Member/Cerberus/E-Mail/cerberuscms@protonmail.com");
copy("System/Default/Friend/Friend.cerb","Member/E-Mail_Addresses/cerberuscms@protonmail.com");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Custom Web Page... Please Wait.<BR>");

/*
 ===========================
 + Install Default Custom Applications
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_custom_pages(custom_page_data,custom_page_name,custom_page_time)VALUES('Hello and welcome to Cerberus! If you\'re reading this then Cerberus was successfully installed!','Welcome To Cerberus','$_GLOBAL_DATE')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Default Ranking System... Please Wait.<BR>");

/*
 ===========================
 + Install Default Ranks
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_ranks(rank_1,rank_2,rank_3,rank_4,rank_5)VALUES('Boann','Brigit','Cliodna','Lugh','Danu')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Pre-Configured Settings... Please Wait.<BR>");

/*
 ===========================
 + Install Default Settings
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_settings(settings_safeHTML_directory,settings_safeHTML_status,settings_cookie_time,settings_gzip_status,settings_image_extension,settings_language_directory,settings_offline_status,settings_site_title,settings_smiles_directory,settings_sound_extension,settings_theme_directory,settings_upload_size_private,settings_upload_size_public,settings_text_editor_directory)VALUES('Default','1','86400','1','png','English','0','Cerberus Content Management System','Default','mp3','Cerberus','256000','10240000','Default')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Statistics... Please Wait.<BR>");

/*
 ===========================
 + Install Default Statistics
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_statistics(statistics_number_of_hits,statistics_start_date)VALUES('1','$_GLOBAL_DATE')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Forum... Please Wait.<BR>");

/*
 ===========================
 + Install Default Forum
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_forum_forum(forum_access_level,forum_date,forum_description,forum_title)VALUES('1','$_GLOBAL_DATE','This is an Example Forum.','Example Forum #1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Topic... Please Wait.<BR>");

/*
 ===========================
 + Install Default Forum Topic
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_forum_topic(topic_access_level,topic_date,topic_description,topic_forum_id,topic_last_post,topic_last_poster,topic_title)VALUES('1','$_GLOBAL_DATE','This is an Example Topic.','1','$_GLOBAL_DATE','Cerberus','Example Topic #1 Within Example Forum #1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Post... Please Wait.<BR>");

/*
 ===========================
 + Install Default Topic Post
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_forum_post(post_access_level,post_author,post_data,post_date,post_last_edit,post_topic_id)VALUES('1','Cerberus','This is an Example Post -- you can Administer the Forum via the Administration cPanel.','$_GLOBAL_DATE','$_GLOBAL_DATE','1')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example File Category (For File Module)... Please Wait.<BR>");

/*
 ===========================
 + Install Default File Category
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_categories(category_description,category_time,category_title)VALUES('This is an Example File Category -- You can Delete this from the Administration cPanel.','$_GLOBAL_DATE','Example File Category.')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example File (For File Module)... Please Wait.<BR>");

/*
 ===========================
 + Install Default File
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_files(file_author,file_category,file_description,file_image,file_location,file_number_of_downloads,file_time,file_title,file_uploader)VALUES('None','1','This is an Example File -- You can Delete this from the Administration cPanel.','0987654321-0987654321.png','0987654321-0987654321.png','1','$_GLOBAL_DATE','Example File','Cerberus')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example Article... Please Wait.<BR>");

/*
 ===========================
 + Install Default Article
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_articles(article_author,article_data,article_time,article_title)VALUES('Cerberus','This is an Example Article -- You can Delete this from the Administration cPanel.','$_GLOBAL_DATE','Example Article')");

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Installing Example News Item... Please Wait.<BR>");

/*
 ===========================
 + Install Default News
 ===========================
*/

mysql_query("INSERT INTO {$_ACCESS_DATABASE_PREFIX}_news(news_author,news_avatar,news_data,news_mood,news_music,news_rss_rfc,news_time,news_title)VALUES('Cerberus','Default.png','This is an Example News Item -- You can Delete this from the Administration cPanel.','None','None','Wed, 05 Aug 2009 15:04:18 -0700','$_GLOBAL_DATE','Example News')");

	echo ("[ Done ]<BR>");

	echo ("[ <A HREF=\"?Page&#61;Unlink_Installation\" TITLE=\"Remove Installation Files\">Remove Installation Files -></A> ]");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect.<BR>");

} // [ + ] IF_CONNECT

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I am not able to Connect to the Database.<BR>");

} // [ + ] IF_MAIN_CONNECT_DB

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, the Password(s) that you have provided me do not match each-other.<BR>");

} // [ + ] IF_PW_EQUAL

} // [ + ] IF_NULL

} // [ + ] IF_DEFAULTS

/*
 ===========================
 +
 +
 + Unlink Installation Page
 +
 +
 ===========================
*/

if ( $_GET["Page"] == "Unlink_Installation" ) {

	echo ("<HR><CENTER>Unlinking Installation Files</CENTER><HR><BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Default S.Q.L. Tables Generator File... Please Wait.<BR>");

if (unlink("System/Default/MySQL/index.php")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Secure-Delete the File: 'System/Default/MySQL/index.php' Please manually Secure-Delete this File before proceeding.<BR>");

} // [ + ] IF_UNLINK

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Default S.Q.L. Tables Generator Cascading Style Sheet (CSS) File... Please Wait.<BR>");

if (unlink("System/Default/MySQL/Style.css")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Secure-Delete the File: 'System/Default/MySQL/Style.css' Please manually Secure-Delete this File before proceeding.<BR>");

} // [ + ] IF_UNLINK

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Default=>S.Q.L. Generator Directory... Please Wait.<BR>");

if (rmdir("System/Default/MySQL")) {

	echo ("[ Done ]<BR>");

} else {

	echo ("<FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Remove the Directory: 'System/Default/MySQL' Please manually Remove this Directory before proceeding.<BR>");

} // [ + ] IF_RMDIR

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Removing Installation Files... Please Wait.<BR>");

if (unlink("Install.php")) {

	echo ("[ Done ]<BR>");

	echo ("<FONT COLOR=\"#CD0000\">[&nbsp;*&nbsp;]</FONT> Redirecting To Cerberus Installation Login Page... Please Wait 15 Seconds.<BR><BR>");

	echo ("<META HTTP-EQUIV=Refresh CONTENT=\"15; URL=Cerberus.php?Application=Login\">");

} else {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, I was not able to Secure-Delete the File: 'Install.php' Please manually Secure-Delete this File before proceeding.</BIG><BR>");

} // [ + ] IF_UNLINK

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: I am Testing the PHP mail() Function. Please wait...</BIG><BR>");

if (mail($_ACCESS_ADMIN_EMAIL,"Cerberus - Testing mail() Function.","-------This is a test to see if your servers' PHP mail() Function is working.-------")) {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: I have Tested the PHP mail() Function and it seems to be working.</BIG><BR>");

} else {

	echo ("<BIG><FONT COLOR=\"#CD0000\">***</FONT> Cerberus: Error, the PHP mail() Function is not working; please fix this before using Cerberus Content Management System.</BIG>");

} // [ + ] IF_MAIL

} // [ + ] IF_DELETE

/*
 ===========================
 +
 +
 + Information Pages
 +
 +
 ===========================
*/

 /*
 ===========================
 +
 + Cerberus System Information Page
 +
 ===========================
*/

if ( $_GET["Page"] == "Cerberus_Information" ) {

echo ("
		<HR><CENTER>Cerberus Content Management System Information</CENTER><HR><BR>
		<CENTER>Full Version: $_CERBERUS_FULL_VERSION</CENTER><BR>
		<CENTER>Short Version: $_CERBERUS_VERSION</CENTER><BR>
		<CENTER>Data Validation Server: $_TINKESOFTWARE_SERVER</CENTER><BR>
");

} // [ + ] Cerberus_Information

/*
 ===========================
 +
 + PHP Information Page
 +
 ===========================
*/

if ( $_GET["Page"] == "PHP_Information" ) {

	echo ("<HR><CENTER>Currenty Running PHP Engine Information</CENTER><HR><BR>");
	phpinfo();
	echo ("<BR>");

} // [ + ] PHP_Info

/*
 ===========================
 +
 + PHP Extensions Page
 +
 ===========================
*/

if ( $_GET["Page"] == "PHP_Extensions" ) {

	echo ("<HR><CENTER>Currently Loaded PHP Extensions</CENTER><HR><BR>");
	print_r(get_loaded_extensions());
	echo ("<BR>");

} // [ + ] PHP_Extensions

/*
 ===========================
 +
 + File Permissions Page
 +
 ===========================
*/

if ( $_GET["Page"] == "File_Permissions" ) {

echo ("
		<HR>
			<CENTER>Directories, Files and Permissions List</CENTER>
		<HR><BR>
			<Center>Nothing here yet.</CENTER>
");

} // [ + ] File_Permissions

/*
 ===========================
 +
 +
 + End HTML Document Output
 +
 +
 ===========================
*/

	echo ("<HR><CENTER>Copyright <BIG><B>&copy;</B></BIG> <A HREF=\"https://www.GitHub.com/TinkeSoftware\" TARGET=\"_NEW\" TITLE=\"Tinke Software On :: GitHub\">Tinke Software</A>, <A HREF=\"https://www.SourceForge.net/projects/cerberuscms\" TITLE=\"Cerberus Content Management System Project On :: SourceForge\">Cerberus Content Management System</A>, <A HREF=\"mailto:GCJohnsonChevalier@Protonmail.com\" TITLE=\"Send E-Mail To :: GCJohnsonChevalier@Protonmail.com\">Gary Christopher Johnson</A>, 2005 - 2019.</CENTER><HR></TD></TR></TABLE>
	</BODY>
</HTML>
");
?>