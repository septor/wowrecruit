<?php

if (!defined('e107_INIT')) { exit; }

define("WOWREC", e_PLUGIN."wowrecruit_menu/");

function recruitBlock($class, $demand){
	$demand = (isset($demand) ? $demand : WOWREC_LAN01);
	return "
	<tr>
		<td><img src='".WOWREC."images/".strtolower(str_replace(" ", "", $class)).".gif' border='0'></td>
		<td><span class='".str_replace(" ", "", $class)."'>".$class."</span></td>
		<td style='text-align: right;'><span class='wr".$demand."'>".$demand."</span></td>
	</tr>";
}


$text = "
<table border='0' style='width=100%' cellspacing='1' cellpadding='1'>
	<tr>
		<td colspan='3' style='text-align: center;'>
			<a href='".$menu_pref['wowrecruit_menu']['recruit_url']."'>".WOWREC_LAN05."</a>
		</td>
	</tr>
	<tr>
		<td colspan='3'>&nbsp;</td>
	</tr>
	<tr>
		<td colspan='2'>".WOWREC_LAN06."</td>
		<td>".WOWREC_LAN07."</td>
	</tr>";

	$text .= recruitBlock(WOWREC_CLASS01, $menu_pref['wowrecruit_menu']['deathknight']);
	$text .= recruitBlock(WOWREC_CLASS02, $menu_pref['wowrecruit_menu']['druid']);
	$text .= recruitBlock(WOWREC_CLASS03, $menu_pref['wowrecruit_menu']['hunter']);
	$text .= recruitBlock(WOWREC_CLASS04, $menu_pref['wowrecruit_menu']['mage']);
	$text .= recruitBlock(WOWREC_CLASS05, $menu_pref['wowrecruit_menu']['paladin']);
	$text .= recruitBlock(WOWREC_CLASS06, $menu_pref['wowrecruit_menu']['priest']);
	$text .= recruitBlock(WOWREC_CLASS07, $menu_pref['wowrecruit_menu']['rogue']);
	$text .= recruitBlock(WOWREC_CLASS08, $menu_pref['wowrecruit_menu']['shaman']);
	$text .= recruitBlock(WOWREC_CLASS09, $menu_pref['wowrecruit_menu']['warlock']);
	$text .= recruitBlock(WOWREC_CLASS10, $menu_pref['wowrecruit_menu']['warrior']);


$text .= "</table>";

$ns->tablerender(WOWREC_TITLE, $text, 'wowrecruit');

?>