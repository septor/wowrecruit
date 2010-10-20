<?php

if (!defined('e107_INIT')) { exit; }

define("WOWREC", e_PLUGINS."wowrecruit_menu/");

// #######################################################
// ### WoW Recruit Menu Configuration Start ##############

// modify the below to signify the need for each class.
// supported availability modes are: None, Low, Medium, High

$deathknight = "High";
$druid = "High";
$hunter = "High";
$mage = "High";
$paladin = "High";
$priest = "High";
$rogue = "High";
$shaman = "High";
$warlock = "High";
$warrior = "High";


// URL to your recruitment thread, forum, whatever.
$recruitment_thread = "#"


// ### WoW Recruit Menu Configuration End ################
// #######################################################

// no further editing should be required!

function recruitBlock($class, $demand){
	return "
	<tr>
		<td><img src='".WOWREC".images/".strtolower($class).".gif' border='0'></td>
		<td'><span class='".str_replace(" ", "", $class)."'>".$class."</span></td>
		<td><span class='wr".$demand."'>".$demand."</span></td>
	</tr>";
}


$text = "
<table border='0' style='width=100%' cellspacing='0' cellpadding='0'>
	<tr>
		<td colspan='3'>
			<a href='".$recruitment_thread."'>Click here to Apply</a>
		</td>
	</tr>

	<tr>
		<td colspan='2'>Class Name</td>
		<td>Current Need</td>
	</tr>";

$text .= recruitBlock("Death Knight", $deathknight);
$text .= recruitBlock("Druid", $druid);
$text .= recruitBlock("Hunter", $hunter);
$text .= recruitBlock("Mage", $mage);
$text .= recruitBlock("Paladin", $paladin);
$text .= recruitBlock("Priest", $priest);
$text .= recruitBlock("Rogue", $rogue);
$text .= recruitBlock("Shaman", $shaman);
$text .= recruitBlock("Warlock", $warlock);
$text .= recruitBlock("Warrior", $warrior);


$text .= "</table>";

$ns->tablerender("Recruitment Status", $text, 'wowrecruit');

?>