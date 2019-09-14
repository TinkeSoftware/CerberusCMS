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
 + - File Location: root->System->Default->MySQL->index.php
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
 + Global Variables
 +
 +
 ===========================
*/

$_GLOBAL_DATE								= date("l, F j, Y g:i:s A");
$_GLOBAL_DATE_MD5							= md5($_GLOBAL_DATE);

/*
 ===========================
 +
 +
 + HTML Header Output
 +
 +
 ===========================
*/

echo ("
<HTML>
	<HEAD>
		<TITLE>Cerberus S.Q.L. Tables Generator</TITLE>
		<LINK REL=\"stylesheet\" HREF=\"Style.css\" TYPE=\"text/css\">
		<META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html;charset=utf-8\">
	</HEAD>

	<BODY>
		<HR><CENTER>[ <A HREF=\"?\" TITLE=\"Click Here To Return To The S.Q.L. Generation Form\">Cerberus Content Management System S.Q.L. Tables Generator</A> ]</CENTER><HR><BR>
");

/*
 ===========================
 +
 +
 + Post Variables
 +
 +
 ===========================
*/

$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX 				= $_POST['post_database_prefix'];
$_MySQL_Generator_POST_ADMINISTRATION_USERNAME				= $_POST['post_administration_username'];
$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD				= $_POST['post_administration_password'];

/*
 ===========================
 +
 +
 + Password Hashing System
 +
 +
 ===========================
*/

$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH			= password_hash($_MySQL_Generator_POST_ADMINISTRATION_PASSWORD, PASSWORD_BCRYPT);
$_MySQL_Generator_ADMINISTRATION_PASSWORD_HASH_MD5				= md5($_MySQL_Generator_POST_ADMINISTRATION_PASSWORD);

/*
 ===========================
 +
 +
 + S.Q.L. Tables Generation Form
 +
 +
 ===========================
*/

echo ("
		S.Q.L. Tables Generation Form<BR><BR>
		<FORM ACTION=\"?\" METHOD=\"POST\">
			Database Prefix Naming:<BR>
			[ Do Not Input Any Underscores Or Symbols ]<BR>
				<INPUT TYPE=\"TEXT\" NAME=\"post_database_prefix\" VALUE=\"Cerberus\"><BR><BR>
			Administration Account UserName:<BR>
				<INPUT TYPE=\"TEXT\" NAME=\"post_administration_username\"><BR>
			Administration Account Password:<BR>
			[ It Is Recommended To Use a Password Generation and Storage Application Such As KeePass ]<BR>
			[ When Using a Password Generator: Set Options To 50 Random Characters ]<BR>
				<INPUT TYPE=\"PASSWORD\" NAME=\"post_administration_password\"><BR>
			<INPUT TYPE=\"SUBMIT\" VALUE=\"Generate\"><BR>
		</FORM>
");

if ($_MySQL_Generator_POST_ADMINISTRATION_USERNAME) {

/*
 ===========================
 +
 +
 + MySQL Tables Generator
 +
 +
 ===========================
*/

$_MySQL_Generator_PRINT_MySQL_TABLES	= "

/* $_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX */

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
ahref_name VARCHAR(250),
ahref_row CHAR(3),
ahref_url VARCHAR(250),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
application_file_name VARCHAR(100),
application_file_permission CHAR(1),
application_file_status CHAR(1),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_articles (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
article_author VARCHAR(50),
article_data TEXT,
article_time VARCHAR(50),
article_title VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_banned_ip_addresses (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
ip_address VARCHAR(128),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
block_file_name VARCHAR(250),
block_alignment CHAR(1),
block_row CHAR(2),
block_file_status CHAR(1),
block_title VARCHAR(250),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_categories (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
category_description VARCHAR(250),
category_time VARCHAR(50),
category_title VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_custom_pages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
custom_page_data TEXT,
custom_page_name VARCHAR(250),
custom_page_time VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_comments (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
comment_author VARCHAR(50),
comment_data TEXT,
comment_application_id CHAR(20),
comment_application_name VARCHAR(100),
comment_time VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_files (
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
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_forum (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
forum_access_level CHAR(1),
forum_date VARCHAR(50),
forum_description TEXT,
forum_title VARCHAR(200),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_post (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
post_access_level CHAR(1),
post_author VARCHAR(50),
post_data TEXT,
post_date VARCHAR(50),
post_last_edit VARCHAR(50),
post_topic_id CHAR(20),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_topic (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
topic_access_level CHAR(1),
topic_date VARCHAR(50),
topic_description TEXT,
topic_forum_id CHAR(20),
topic_last_post VARCHAR(50),
topic_last_poster CHAR(20),
topic_title VARCHAR(200),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_links (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
link_author VARCHAR(50),
link_description TEXT,
link_time VARCHAR(50),
link_title VARCHAR(50),
link_url VARCHAR(250),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members (
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
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news (
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
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_private_messages (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
private_message_from VARCHAR(50),
private_message_recipient VARCHAR(50),
private_message_subject VARCHAR(250),
private_message_data TEXT,
private_message_sent_time VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ranks (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
rank_1 VARCHAR(100),
rank_2 VARCHAR(100),
rank_3 VARCHAR(100),
rank_4 VARCHAR(100),
rank_5 VARCHAR(100),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_settings (
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
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_shouts (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
shout_author VARCHAR(50),
shout_data VARCHAR(250),
shout_time VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_statistics (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
statistics_number_of_hits CHAR(15),
statistics_start_date VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news_submissions (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
submission_author VARCHAR(50),
submission_data TEXT,
submission_time VARCHAR(50),
PRIMARY KEY (id)
);

CREATE TABLE {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_system_message (
id MEDIUMINT NOT NULL AUTO_INCREMENT,
system_message_data TEXT,
system_message_member VARCHAR(50),
PRIMARY KEY (id)
);
";

/*
 ===========================
 +
 +
 + Data Strings From Installation File
 +
 +
 ===========================
*/

$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS	= "

/* Links */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Articles','001','?Application&#61;Articles&amp;DisplayID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Contact','002','?Application&#61;Contact_Admin');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Documentation','003','?Application&#61;Documentation');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Files','004','?Application&#61;Files&amp;CategoryID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Forum','005','?Application&#61;Forum&amp;ForumID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Legal','006','?Application&#61;Legal');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Links','007','?Application&#61;Links&amp;DisplayID&#61;All');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Login','008','?Application&#61;Login');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Member List','009','?Application&#61;Members');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Members Online','010','?Application&#61;Members_Online');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('News','011','?Application&#61;News');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Referrers','013','?Application&#61;Referrers');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('RSS Feed','014','RSS.php');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Register','015','?Application&#61;Register');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Search','016','?Application&#61;Search');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Statistics','017','?Application&#61;Statistics');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Submit Link','018','?Application&#61;Links&amp;SubmitLink&#61;Yes');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Submit News','019','?Application&#61;Submit_News');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Upload File','020','?Application&#61;Upload');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ahref(ahref_name,ahref_row,ahref_url)VALUES('Welcome!','021','?customApplication&#61;1');

/* Applications */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_News','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('All_Shouts','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Articles','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Application_List','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Change_Password','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Comment','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Contact_Admin','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('cPanel','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Documentation','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Edit_Profile','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('E-Mail','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Files','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Forum','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Friend','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Legal','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Links','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('List','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Login','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Members_Online','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('News','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Files','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Private_Message','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Profile','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Referrers','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Register','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Reset_Password','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Search','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Send_Friend','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Statistics','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Submit_News','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('System_Message','0','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Upload','1','1');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_applications(application_file_name,application_file_permission,application_file_status)VALUES('Webspace','1','1');

/* Blocks */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Articles','0','3','1','<CENTER><B>Articles</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Banned','0','4','1','<CENTER><B>Banned IP Addresses</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Cerberus','1','1','1','<CENTER><B>Cerberus</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Files','1','3','1','<CENTER><B>Files</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Language','1','6','1','<CENTER><B>Set Language</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Modules','0','1','1','<CENTER><B>Modules</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Members','0','2','1','<CENTER><B>Member Panel</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Member_List','1','4','1','<CENTER><B>Newest Members</B></CENTER><HR>');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_blocks(block_file_name,block_alignment,block_row,block_file_status,block_title)VALUES('Shouts','1','5','1','<CENTER><B>Shout Messages</B></CENTER><HR>');

/* Administrator */

/* Custom Page */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_custom_pages(custom_page_data,custom_page_name,custom_page_time)VALUES('Hello and welcome to Cerberus! If you\'re reading this then Cerberus was successfully installed!','Welcome To Cerberus','$_GLOBAL_DATE');

/* Ranks */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_ranks(rank_1,rank_2,rank_3,rank_4,rank_5)VALUES('Boann','Brigit','Cliodna','Lugh','Danu');

/* Settings */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_settings(settings_safeHTML_directory,settings_safeHTML_status,settings_cookie_time,settings_gzip_status,settings_image_extension,settings_language_directory,settings_offline_status,settings_site_title,settings_smiles_directory,settings_sound_extension,settings_theme_directory,settings_upload_size_private,settings_upload_size_public)VALUES('Default','1','86400','1','png','English','0','Cerberus Content Management System','Default','mp3','Cerberus','256000','10240000');

/* Statistics */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_statistics(statistics_number_of_hits,statistics_start_date)VALUES('1','$_GLOBAL_DATE');

/* Forum */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_forum(forum_access_level,forum_date,forum_description,forum_title)VALUES('1','$_GLOBAL_DATE','This is an Example Forum.','Example Forum #1');

/* Example Topic */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_topic(topic_access_level,topic_date,topic_description,topic_forum_id,topic_last_post,topic_last_poster,topic_title)VALUES('1','$_GLOBAL_DATE','This is an Example Topic.','1','$_GLOBAL_DATE','Cerberus','Example Topic #1 Within Example Forum #1');

/* Example Post */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_forum_post(post_access_level,post_author,post_data,post_date,post_last_edit,post_topic_id)VALUES('1','Cerberus','This is an Example Post -- you can Administer the Forum via the Administration cPanel.','$_GLOBAL_DATE','$_GLOBAL_DATE','1');

/* Example File Category ( For File Module ) */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_categories(category_description,category_time,category_title)VALUES('This is an Example File Category -- You can Delete this from the Administration cPanel.','$_GLOBAL_DATE','Example File Category.');

/* Example File ( For File Module ) */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_files(file_author,file_category,file_description,file_image,file_location,file_number_of_downloads,file_time,file_title,file_uploader)VALUES('None','1','This is an Example File -- You can Delete this from the Administration cPanel.','0987654321-0987654321.png','0987654321-0987654321.png','1','$_GLOBAL_DATE','Example File','Cerberus');

/* Example Article */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_articles(article_author,article_data,article_time,article_title)VALUES('Cerberus','This is an Example Article -- You can Delete this from the Administration cPanel.','$_GLOBAL_DATE','Example Article');

/* Example News Item */

INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_news(news_author,news_avatar,news_data,news_mood,news_music,news_rss_rfc,news_time,news_title)VALUES('Cerberus','Default.png','This is an Example News Item -- You can Delete this from the Administration cPanel.','None','None','$_GLOBAL_DATE','$_GLOBAL_DATE','Example News');
";

$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT	= "
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_email_address,member_experience_amount,member_join_date,member_language,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','Write E-Mail Address Here','0','$_GLOBAL_DATE','English','$_MySQL_Generator_POST_ADMINISTRATION_USERNAME','1','1','$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH','1','$_GLOBAL_DATE_MD5','0');
INSERT INTO {$_MySQL_Generator_POST_ACCESS_DATABASE_PREFIX}_members(member_access_level,member_avatar,member_banned_status,member_email_address,member_experience_amount,member_join_date,member_language,member_username,member_newsletter,member_number_of_posts,member_password,member_t_logged,member_t_random,member_sound)VALUES('2','Default.png','0','CerberusCMS@Protonmail.com','0','$_GLOBAL_DATE','English','Cerberus','1','1','$_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH','1','$_GLOBAL_DATE_MD5','0');
";

$_MySQL_Generator_PRINT_MySQL_TABLES						= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_TABLES);
$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS					= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS);
$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT				= str_replace('\"', '', $_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT);

		echo ("Administration UserName / Password HASHED ( Message Digest 5 HASH Algorithm=>Blowfish, Salt ) / Password Pure MD5 / Password Clear<BR>");
		echo ("<TEXTAREA ROWS=\"3\" COLS=\"75\" MAXLENGTH=\"10000\">Administration Username: $_MySQL_Generator_POST_ADMINISTRATION_USERNAME / Administration Password With BlowFish & Salted: $_MySQL_Generator_POST_ADMINISTRATION_PASSWORD_HASH / Administration Password Pure MD5: $_MySQL_Generator_ADMINISTRATION_PASSWORD_HASH_MD5 / Administration Password Clear: $_MySQL_Generator_POST_ADMINISTRATION_PASSWORD</TEXTAREA><BR><BR>");

		echo ("MySQL Tables Generated:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_TABLES</TEXTAREA><BR><BR>");

		echo ("Manual Data Tables Strings:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_TABLE_STRINGS</TEXTAREA><BR><BR>");

		echo ("Administration Account SQL Insertion String:<BR>");
		echo ("<TEXTAREA ROWS=\"15\" COLS=\"115\" MAXLENGTH=\"10000\">$_MySQL_Generator_PRINT_MySQL_ADMINISTRATION_ACCOUNT</TEXTAREA>");

} // [ + ] IF_POST

/*
 ===========================
 +
 +
 + HTML Document End
 +
 +
 ===========================
*/

echo ("
	</BODY>
</HTML>
");
?>