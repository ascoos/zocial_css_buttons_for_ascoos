<?php
/*
  __ _  ___  ___ ___   ___   ___     ____ _ __ ___   ___
 / _` |/  / / __/ _ \ / _ \ /  /    / __/| '_ ` _ \ /  /
| (_| |\  \| (_| (_) | (_) |\  \   | (__ | | | | | |\  \
 \__,_|/__/ \___\___/ \___/ /__/    \___\|_| |_| |_|/__/
                                                                  
*************************************************************************************
* @ Project ASCOOS                                                                  *
* @ Copyright (C) 2007 - 2012 AlexSoft Software.                                    *
* @ Address: Konstantinoupoleos 88, GR 68100, Alexandroupolis, Evros, Greece        *
* @ Tel: +30 2551 031999                                                            *
* @ Creator: Drogidis Christos                                                      *
* @ ASCOOS CMS Site: www.ascoos.com                                                 *
* @ Creator Site: www.alexsoft.gr                                                   *
* @ emails: webmaster@ascoos.com, webmaster@alexsoft.gr                             *
* @ license site: http://www.alexsoft.gr/licence/ascoos/index.php                   *
* @ Copyrighted Commercial Software                                                 *
* @ Program ASCOOS CMS Manager                                                      *
*************************************************************************************

* @ Package           : ASCOOS CMS - Frontend
* @ Subpackage        : Themes - Typography - Zocial CSS Buttons For Ascoos Typography
* @ ASCOOS Version    : Lite - 1.0.0
* @ File Name         : /themes/typography/zocial_css_buttons_for_ascoos/install.php
* @ File No.          : 1 - $release: 1.0 - $revision: 0 - $build: 0
* @ Created Date      : 2012-05-31 22:00:00 UTC+2 
* @ Updated Date      : 
* @ Author            : Drogidis Christos
* @ Author email      : webmaster@alexsoft.gr
* @ Author website    : www.alexsoft.gr
*/

defined ("ALEXSOFT_RUN_CMS") or die("Prohibition of Access.");

global $objInstaller;

// Adjust the installer to work at TYPOGRAPHY THEME and give the TYPOGRAPHY that will handle
$objInstaller->setExtension('zocial_css_buttons_for_ascoos', 50);

// We adjust the installer so that after installation, to take us or not part of the he TYPOGRAPHY configuration.
$objInstaller->afterSetParams(false);

// If the he TYPOGRAPHY is not installed then run the installation.
if (!$objInstaller->isInstalled()) {
	// We create the path of the he TYPOGRAPHY.
	$objInstaller->createPath();
	
	// If the installation files on the Server is successful
	if ( $objInstaller->extractPackage() )
	{
		// Place the he TYPOGRAPHY in the database.
		$objInstaller->addSQL("INSERT INTO `asc_themes` (`id`, `name`, `title`, `type`, `client`, `wallpaper`, `taskbar`, `window`, `menu`, `defaults`, `published`, `params`) VALUES(NULL, '".$objInstaller->name."', '{\"en\":\"Zocial CSS Buttons For ASCOOS CMS Typography\",\"el\":\"Κουμπιά CSS Zocial για την Τυπογραφία του ASCOOS CMS\"}', 0, 8, '', '', '', '', 0, 0, '{\"browsers\":\"\",\"css3\":1,\"html5\":0}');");
		
		// pour the settings from the installer.
		$objInstaller->clear();
		
	} else {
		// otherwise cancel the installation and pour the settings from the installer.
		$objInstaller->cancelInstallation();
	}
} else { // else pour the settings from the installer.
	$objInstaller->clear();
}
?>