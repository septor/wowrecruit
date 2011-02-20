<?php
if(!defined("e107_INIT")) {
	require_once("../../class2.php");
}
require_once(e_HANDLER."userclass_class.php");
if(!getperms("P")){ header("location:".e_BASE."index.php"); exit;}
require_once(e_ADMIN."auth.php");
include_lan(e_PLUGIN."wowrecruit_menu/languages/".e_LANGUAGE.".php");

// until I work up the motivation to manage this better
$class = array(
	0 => 	WOWREC_DEATHKNIGHT,
	1 => 	WOWREC_DRUID,
	2 => 	WOWREC_HUNTER,
	3 => 	WOWREC_MAGE,
	4 => 	WOWREC_PALADIN,
	5 => 	WOWREC_PRIEST,
	6 => 	WOWREC_ROGUE,
	7 => 	WOWREC_SHAMAN,
	8 => 	WOWREC_WARLOCK,
	9 => 	WOWREC_WARRIOR
);
$spec = array(
	WOWREC_DEATHKNIGHT => array(WOWREC_BLOOD, WOWREC_FROST, WOWREC_UNHOLY),
	WOWREC_DRUID => array(WOWREC_BALANCE, WOWREC_FERAL, WOWREC_RESTORATION),
	WOWREC_HUNTER => array(WOWREC_BEASTMASTERY, WOWREC_MARKSMANSHIP, WOWREC_SURVIVAL),
	WOWREC_MAGE => array(WOWREC_ARCANE, WOWREC_FIRE, WOWREC_FROST),
	WOWREC_PALADIN => array(WOWREC_HOLY, WOWREC_PROTECTION, WOWREC_RETRIBUTION),
	WOWREC_PRIEST => array(WOWREC_DISCIPLINE, WOWREC_HOLY, WOWREC_SHADOW),
	WOWREC_ROGUE => array(WOWREC_ASSASSINATION, WOWREC_COMBAT, WOWREC_SUBTLETY),
	WOWREC_SHAMAN => array(WOWREC_ELEMENTAL, WOWREC_ENHANCEMENT, WOWREC_RESTORATION),
	WOWREC_WARLOCK => array(WOWREC_AFFLICTION, WOWREC_DEMONOLOGY, WOWREC_DESTRUCTION),
	WOWREC_WARRIOR => array(WOWREC_ARMS, WOWREC_FURY, WOWREC_PROTECTION)
);


if(isset($_POST['add'])){
	if($_POST['count'] >= 0 && is_numeric($_POST['count'])){
		$class_spec = explode(".", $_POST['class_spec']);
		$sql->db_Insert("wowrecruit_needed", "'', '".intval($_POST['count'])."', '".$tp->toDB($class[$class_spec[0]])."', '".$tp->toDB($spec[$class[$class_spec[0]]][$class_spec[1]])."'") or die(mysql_error());
		$message = WOWREC_ADD01.$_POST['count']." ".$spec[$class[$class_spec[0]]][$class_spec[1]]." ".$class[$class_spec[0]].($_POST['count'] > 1 ? "s" : "")."!";
	}else{
		$message = WOWREC_ADD02;
	}
}

if (isset($message)) {
	$ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}

if(check_class($pref['wowrecruit_manageclass'])){

	$text = "
	<div style='text-align:center'>
	<form method='post' action='".e_SELF."'>
	<table style='width:50%' class='fborder'>
	<td style='width:70%;' class='fcaption'>".WOWREC_ADD03."</td>
	<td style='width:20%;' class='fcaption'>".WOWREC_ADD04."</td>
	<td style='width:10%;' class='fcaption'>&nbsp;</td>
	<tr>
	<td style='width:70%; text-align:center;' class='forumheader3'>
	<select name='class_spec' class='tbox'>";
	for($i = 0; $i <= 9; $i++){
		$text .= "<option value='".$i.".0'>".$spec[$class[$i]][0]." ".$class[$i]."</option>
		<option value='".$i.".1'>".$spec[$class[$i]][1]." ".$class[$i]."</option></option>
		<option value='".$i.".2'>".$spec[$class[$i]][2]." ".$class[$i]."</option></option>";
	}
	$text .= "</select>
	</td>
	<td style='width:20%; text-align:center;' class='forumheader3'>
	<input  size='10' class='tbox' type='text' name='count' value=''>
	</td>
	<td style='width:10%; text-align:center;' class='forumheader3'>
	<input class='button' type='submit' name='add' value='".WOWREC_ADD05."' />
	</td>
	</tr>
	</table>
	</form>
	</div>
	";

}else{
	$text = WOWREC_ADD06;
}

$ns->tablerender(WOWREC_ADD07, $text);
require_once(e_ADMIN."footer.php");
?>