<?php
include_lan(e_PLUGIN."wowrecruit_menu/languages/".e_LANGUAGE.".php");

// -- [ PLUGIN INFO ]
$eplug_name        = "WoW Recruitment Menu";
$eplug_version     = "0.5";
$eplug_author      = "Patrick Weaver";
$eplug_url         = "http://painswitch.com/";
$eplug_email       = "patrickweaver@gmail.com";
$eplug_description = WOWREC_PLUG01;
$eplug_compatible  = "e107 0.7+";
$eplug_readme      = "";
$eplug_compliant   = TRUE;
$eplug_module      = FALSE;
$eplug_folder     = "wowrecruit_menu";
$eplug_menu_name  = "wowrecruit_menu";
$eplug_conffile   = "admin_config.php";
$eplug_logo       = "";
$eplug_icon       = "";
$eplug_icon_small = "";
$eplug_caption    = WOWREC_PLUG02;

// -- [ DEFAULT PREFERENCES ]
$eplug_prefs = array(
	"wowrecruit_manageclass" => "",
	"wowrecruit_url" => "#"
);

// -- [ MYSQL TABLES ]
$eplug_table_names = array("wowrecruit_needed");

$eplug_tables = array(
	"CREATE TABLE ".MPREFIX."wowrecruit_needed (
		id int(10) unsigned NOT NULL auto_increment,
		count int(10) unsigned NOT NULL,
		class varchar(250) NOT NULL,
		spec varchar(250) NOT NULL,
		PRIMARY KEY  (id)
	) TYPE=MyISAM AUTO_INCREMENT=1;"
);

// -- [ MAIN SITE LINK ]
$eplug_link      = FALSE;
$eplug_link_name = "";
$eplug_link_url  = "";

// -- [ INSTALLED MESSAGE ]
$eplug_done = $eplug_name.WOWREC_PLUG03;

// -- [ UPGRADE INFORMATION ]
$upgrade_add_prefs    = "";
$upgrade_remove_prefs = "";
$upgrade_alter_tables = "";

$eplug_upgrade_done = $eplug_name.WOWREC_PLUG04;

?>