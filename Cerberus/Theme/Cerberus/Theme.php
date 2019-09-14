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
 + ---
 + - File Location: root->Theme->Cerberus->Theme.php
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
 +%%()%%%%%()%%%%%%()%%()%%()%%()%%()%%%%%%()%%()%%()%%()%%%%%%()%%%%%%%%%%%%|4|%
 +%%%()()%%()()()%%()%%()%%()()()%%()()()%%()%%()%%()()()%%()()()%%%%%%%%%%%%\-/% Build 0.6
 ===========================================================================================
*/

/*
 ===========================
 +
 +
 + Theme Variables
 +
 +
 ===========================
*/

$_THEME_DIRECTORY				= "Cerberus";
$_THEME_DIRECTORY_IMAGE				= "Image";

/*
 ===========================
 +
 +
 + Blocks, Left Tables
 +
 +
 ===========================
*/

$_THIS_THEMES_BLOCKS_1			= "
						<CENTER>
							<TABLE BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">
								<TR>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Block/1.png\" ALT=\"Image\"></TD>
									<TD CLASS=\"BI2\"></TD>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Block/3.png\" ALT=\"Image\"></TD>
								</TR>

								<TR>
									<TD CLASS=\"BI4\"></TD>
									<TD CLASS=\"BI5\" WIDTH=\"600\">
";

/*
 ===========================
 +
 +
 + Blocks, Right Tables
 +
 +
 ===========================
*/

$_THIS_THEMES_BLOCKS_2			= "
									<TD CLASS=\"BI6\"></TD>
								</TR>

								<TR>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Block/7.png\" ALT=\"Image\"></TD>
									<TD CLASS=\"BI8\"></TD>
									<TD CLASS=\"BI9\"></TD>
								</TR>
							</TABLE>
						</CENTER>

						<BR>
";

/*
 ===========================
 +
 +
 + Modules, Center Table
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Module Images Left
 +
 ===========================
*/

$_THIS_THEMES_MODULES_1			= "
						<CENTER>
							<TABLE BORDER=\"0\" CELLPADDING=\"0\" CELLSPACING=\"0\">
								<TR>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Module/1.png\" ALT=\"Image\"></TD>
									<TD CLASS=\"MI2\"></TD>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Module/3.png\" ALT=\"Image\"></TD>
								</TR>

								<TR>
									<TD CLASS=\"MI4\"></TD>
									<TD CLASS=\"MI5\" WIDTH=\"600\">
";

/*
 ===========================
 +
 + Module Images Right
 +
 ===========================
*/

$_THIS_THEMES_MODULES_2			= "
									<TD CLASS=\"MI6\"></TD>
								</TR>

								<TR>
									<TD><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Module/7.png\" ALT=\"Image\"></TD>
									<TD CLASS=\"MI8\"></TD>
									<TD CLASS=\"MI9\"></TD>
								</TR>
							</TABLE>
						</CENTER>
";

/*
 ===========================
 +
 +
 + Customizable Meta Data
 +
 +
 ===========================
*/

$_GLOBAL_META_TAGS			= "
		<Link REL=\"shortcut icon\" HREF=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Icon/FavIcon.ico\" TYPE=\"image/x-icon\">
		<META NAME=\"COPYRIGHT\" CONTENT=\"(C) Tinke Software\">
		<META NAME=\"KEYWORDS\" CONTENT=\"Tinke Software, Tinke Byte, Content, Management, System, Cerberus, Apache, PHP, MySQL, SQL\">
		<META NAME=\"DESCRIPTION\" CONTENT=\"Cerberus Content Management System, Version: 4, Build: 0.6 ~ Wyn ~\">
		<META NAME=\"ROBOTS\" CONTENT=\"Cerberus Content Management System, Version: 4, Build: 0.6 ~ Wyn ~\">
		<META NAME=\"REVISIT-AFTER\" CONTENT=\"1 DAYS\">
		<META NAME=\"RATING\" CONTENT=\"GLOBAL\">
		<META NAME=\"GENERATOR\" CONTENT=\"Cerberus Content Management System, Version: 4, Build: 0.6 ~ Wyn - Ghost\">
";

/*
 ===========================
 +
 +
 + Layout
 +
 +
 ===========================
*/

/*
 ===========================
 +
 + Layout [ 1 ]
 +
 ===========================
*/

$_GLOBAL_LAYOUT_1			= "
		<CENTER><A HREF=\"?$_INTERNAL_USER_MODULE&#61;News\"><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Banner/Banner_1.png\" WIDTH=\"80%\" TITLE=\"Open Application :: News\" ALT=\"Open Application :: News\"></A></CENTER>

		<CENTER>
			<TABLE WIDTH=\"80%\">
				<TR>
					<TD VALIGN=\"Top\">
";

/*
 ===========================
 +
 + Layout [ 2 ]
 +
 ===========================
*/

$_GLOBAL_LAYOUT_2			= "
					</TD>

					<TD VALIGN=\"Top\" WIDTH=\"100%\">
						$_THIS_THEMES_MODULES_1
";

/*
 ===========================
 +
 + Layout [ 3 ]
 +
 ===========================
*/

$_GLOBAL_LAYOUT_3			= "
						$_THIS_THEMES_MODULES_2
					</TD>

					<TD VALIGN=\"Top\">
";

/*
 ===========================
 +
 + Layout [ 4 ]
 +
 ===========================
*/

$_GLOBAL_LAYOUT_4			= "
					</TD>
				</TR>
			</TABLE>
		</CENTER>

		<CENTER><IMG SRC=\"Theme/$_THEME_DIRECTORY/$_THEME_DIRECTORY_IMAGE/Banner/Banner_Bottom.png\" WIDTH=\"90%\" TITLE=\"- Cerberus Content Management System -\" ALT=\"- Cerberus Content Management System -\"></CENTER>
";
?>